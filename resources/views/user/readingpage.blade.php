@extends('user.layouts.template')

@section('main-content')
    <div class="bg-white border-b-2 border-dodger-blue-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-16">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('imgs/Logo.png') }}" alt="Logo" class="h-10 w-10 sm:h-12 sm:w-12">
                <p class="font-bold text-lg sm:text-xl">Ignite<span class="text-dodger-blue-500">Future</span></p>
            </div>

            <div class="flex items-center space-x-2 sm:space-x-4">
                @if (Auth::check())
                    <a href="{{ route('logout') }}"
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Log
                        Out</a>
                @else
                    <a href="{{ route('register') }}"
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Create
                        Account</a>
                    <a href="{{ route('login') }}"
                        class="bg-dodger-blue-500 font-medium text-white px-3 py-2 sm:px-4 sm:py-2 rounded-lg hover:bg-dodger-blue-900">Sign
                        In</a>
                @endif
            </div>
        </div>
    </div>

    <div
        class="px-4 sm:px-6 lg:px-16 flex flex-col lg:flex-row items-center justify-between space-y-4 lg:space-y-0 lg:space-x-4">
        <button id="prev-page" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 hidden lg:block">&laquo;</button>

        <div id="pdf-viewer" class="bg-white p-2 rounded-lg shadow-lg flex flex-col lg:flex-row lg:space-x-4 w-full">
            <canvas id="pdf-canvas-1" class="h-screen w-full lg:w-1/2"></canvas>
            <canvas id="pdf-canvas-2" class="h-screen w-full lg:w-1/2 hidden lg:block"></canvas>
        </div>

        <button id="next-page" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 hidden lg:block">&raquo;</button>
    </div>

    <div class="text-center py-4">
        
        <span class="text-lg font-semibold">
            Page
            <input id="page-num-input" type="number" value="1" min="1" step="1"
                class="w-16 text-center border rounded" />
            of <span id="page-count">--</span>
        </span>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

    <script>
        const pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

        const url = "{{ asset($book->content) }}";
        let pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 2,
            canvas1 = document.getElementById('pdf-canvas-1'),
            canvas2 = document.getElementById('pdf-canvas-2'),
            ctx1 = canvas1.getContext('2d'),
            ctx2 = canvas2.getContext('2d'),
            isResponsive = false;

        function updateResponsiveMode() {
            isResponsive = window.innerWidth < 1024;
            canvas2.classList.toggle('hidden', isResponsive);
        }

        window.addEventListener('resize', updateResponsiveMode);
        updateResponsiveMode();

        pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            document.getElementById('page-count').textContent = pdfDoc.numPages;
            renderPages(pageNum);
        }).catch(function(error) {
            console.error("Error loading PDF:", error);
        });

        function renderPages(num) {
            pageRendering = true;

            const newScale = scale * 1.5;

            pdfDoc.getPage(num).then(function(page) {
                const viewport = page.getViewport({
                    scale: newScale
                });
                canvas1.height = viewport.height;
                canvas1.width = viewport.width;

                const renderContext = {
                    canvasContext: ctx1,
                    viewport
                };
                page.render(renderContext);
            });

            if (!isResponsive && num + 1 <= pdfDoc.numPages) {
                pdfDoc.getPage(num + 1).then(function(page) {
                    const viewport = page.getViewport({
                        scale: newScale
                    });
                    canvas2.height = viewport.height;
                    canvas2.width = viewport.width;

                    const renderContext = {
                        canvasContext: ctx2,
                        viewport
                    };
                    page.render(renderContext);
                });
            } else {
                ctx2.clearRect(0, 0, canvas2.width, canvas2.height);
            }

            document.getElementById('page-num-input').value = num;
            pageRendering = false;
        }

        function queueRenderPages(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPages(num);
            }
        }

        function onPrevPage() {
            if (pageNum <= 1) {
                return;
            }
            pageNum = isResponsive ? pageNum - 1 : (pageNum > 2 ? pageNum - 2 : 1);
            queueRenderPages(pageNum);
        }

        function onNextPage() {
            if (pageNum + (isResponsive ? 0 : 1) >= pdfDoc.numPages) {
                return;
            }
            pageNum += isResponsive ? 1 : 2;
            queueRenderPages(pageNum);
        }

        document.getElementById('prev-page').addEventListener('click', onPrevPage);
        document.getElementById('next-page').addEventListener('click', onNextPage);

        const pageNumInput = document.getElementById('page-num-input');
        pageNumInput.addEventListener('change', function() {
            const requestedPage = parseInt(pageNumInput.value);
            if (requestedPage >= 1 && requestedPage <= pdfDoc.numPages) {
                pageNum = isResponsive ? requestedPage : (requestedPage % 2 === 0 ? requestedPage - 1 :
                    requestedPage);
                queueRenderPages(pageNum);
            } else {
                pageNumInput.value = pageNum;
            }
        });

        pageNumInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                pageNumInput.blur();
            }
        });
    </script>
@endsection

@extends('user.layouts.template')

@section('main-content')
    <div class="px-32 pb-2">
        <div class="py-8 text-start font-semibold text-4xl">Art and Culture : Seni Budaya X</div>
    </div>

    <div class="px-16 flex items-center space-x-4 justify-between">
        <button id="prev-page" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">&laquo;</button>

        <div id="pdf-viewer" class="bg-white p-2 rounded-lg shadow-lg flex space-x-4 w-full">
            <canvas id="pdf-canvas-1" class="h-screen w-1/2"></canvas>
            <canvas id="pdf-canvas-2" class="h-screen w-1/2"></canvas>
        </div>

        <button id="next-page" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">&raquo;</button>
    </div>

    <div class="text-center py-4">
        <span class="text-lg font-semibold">
            Page
            <input id="page-num-input" type="number" value="1" min="1" step="2"
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
            ctx2 = canvas2.getContext('2d');

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

            if (num + 1 <= pdfDoc.numPages) {
                pdfDoc.getPage(num + 1).then(function(page) {
                    const viewport = page.getViewport({
                        scale
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
            pageNum = pageNum > 2 ? pageNum - 2 : 1;
            queueRenderPages(pageNum);
        }

        function onNextPage() {
            if (pageNum + 1 >= pdfDoc.numPages) {
                return;
            }
            pageNum += 2;
            queueRenderPages(pageNum);
        }

        document.getElementById('prev-page').addEventListener('click', onPrevPage);
        document.getElementById('next-page').addEventListener('click', onNextPage);

        const pageNumInput = document.getElementById('page-num-input');
        pageNumInput.addEventListener('change', function() {
            const requestedPage = parseInt(pageNumInput.value);
            if (requestedPage >= 1 && requestedPage <= pdfDoc.numPages) {
                pageNum = requestedPage % 2 === 0 ? requestedPage - 1 :
                    requestedPage;
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

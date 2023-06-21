<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(isset($url))
    <div class="fixed top-4 right-4 z-50">
        <div id="toast-default" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Short code created</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    @else
        <div class="fixed top-4 right-4 z-50">
            <div id="toast-default" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">Short code is already created before</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 font-semibold">
                    <a href='{{ route('short-url.create') }}'
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                       focus:ring-blue-300 font-medium rounded-lg text-sm
                       px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700
                       focus:outline-none dark:focus:ring-blue-800">
                        Create new short URL
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <div class="text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        ANALYTICS
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        Track your monthly short URLs activities.
                    </div>
                </div>
                <div class="p-6 text-gray-900">
                   <div>
                       <canvas id="chart"></canvas>
                   </div>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                 Your shortened URLs.
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of
                                    generated short URLs for, concise, simple and easy use.</p>
                            </caption>
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Destination URL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Shortened URL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Last visited at
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Times
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="shortenedURLsTBody">
                            <!--<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4">
                                    Silver
                                </td>
                                <td class="px-6 py-4">
                                    Laptop
                                </td>
                                <td class="px-6 py-4">
                                    $2999
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>-->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    async function request() {
        let metaTag = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = metaTag.getAttribute('content');

        const shortenedURLs = await axios({
            method: 'GET',
            url: '{{ route('api.short-url-analytic.index') }}',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(response => response.data['shortened-urls'])
            .catch(error => console.log(error))

        console.log(100, shortenedURLs);
        let shortenedURLsTBody = document.getElementById('shortenedURLsTBody');
        shortenedURLs.forEach(url => {
            const tr = document.createElement('tr');
            tr.className = 'bg-white border-b dark:bg-gray-800 dark:border-gray-700';

            const th = document.createElement('th')
            th.setAttribute('scope', 'row');
            th.className = 'px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white';

            const originalLink = document.createElement('a');
            originalLink.href = url['destination_url'];
            originalLink.innerHTML = url['destination_url'].substring(0, 30);
            originalLink.className = 'font-medium dark:text-blue-500 hover:underline'
            th.appendChild(originalLink)
            tr.appendChild(th);

            const td_short_url = document.createElement('td');
            td_short_url.className = 'px-6 py-4';
            tr.appendChild(td_short_url);

            const shortenedLink = document.createElement('a');
            shortenedLink.href = `{{ url('') }}/s/${url['short_code']}`
            shortenedLink.innerHTML = `{{ url('') }}/s/${url['short_code']}`
            shortenedLink.className = 'font-medium dark:text-blue-500 hover:underline'
            td_short_url.appendChild(shortenedLink)
            tr.appendChild(td_short_url);

            const td_last_visited_at = document.createElement('td');
            if (url['last_visited_at'] === null) {

                td_last_visited_at.className = 'px-6 py-4 font-semibold text-blue-500';
            } else {
                td_last_visited_at.className = 'px-6 py-4 font-semibold text-sky-500';
            }

            td_last_visited_at.innerHTML = url['last_visited_at'] ?? 'PENDING'


            tr.appendChild(td_last_visited_at);

            const td_total_visited = document.createElement('td');
            td_total_visited.className = 'px-6 py-4';
            td_total_visited.innerHTML = url['short_url_details_count']
            tr.appendChild(td_total_visited);

            shortenedURLsTBody.appendChild(tr);

            /*const td_view_url_detail = document.createElement('td');
            const urlDetailLink = document.createElement('a');
            url.href = url
            td_view_url_detail.className = 'font-medium text-blue-600 hover:underline';*/
        });
    }

    async function chart() {

        let metaTag = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = metaTag.getAttribute('content');

        await axios({
            method: 'GET',
            url: '{{ route('api.short-url-analytic.active') }}',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(response => {
                const data = response.data;
                console.log(data, 200);

                const ctx = document.getElementById('chart');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data['short_url_labels'],
                        datasets: [{
                            label: 'Monthly visited times',
                            data: data['short_url_datasets'],
                            borderWidth: 1,
                            backgroundColor: '#FFB1C1',
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
    }
    window.addEventListener('DOMContentLoaded', (event) => {
        request();
        chart();
    });
</script>

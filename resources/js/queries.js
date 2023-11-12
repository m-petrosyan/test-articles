window.addEventListener("load", function () {
    const csrf = document.querySelector('meta[name="csrf-token"]');
    const elements = document.querySelectorAll('.like-toggle');
    const requestOption = {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-Token": document.querySelector('[name=csrf-token]').getAttribute('content')
        },
    }
    elements.forEach(element => {
        element.addEventListener('click', function () {
            axios.post('/articles/liketoggle/' + this.getAttribute('data-article'), requestOption)
                .then(response => {
                    element.closest('.likes').querySelector('.likes-count').innerHTML = response.data.data.count;
                })
        });
    });

    const article_page = document.getElementById('article-page')
    if (article_page) {
        setTimeout(getNewViewsCount, 5000)
    }

    function getNewViewsCount() {
        axios.post('/articles/add-view/' + article_page.getAttribute('data-id'), requestOption)
            .then(response => {
                document.querySelector('.views-count').innerHTML = response.data.data.views;
            })
    }

    const messages = document.getElementById('messages')
    const comments = document.getElementById('comments')
    document.getElementById('add-comment').addEventListener('click', function () {
        const data = {
            subject: document.getElementById('subject').value,
            body: document.getElementById('body').value
        }
        axios.post('/articles/add-comment/' + article_page.getAttribute('data-id'), {...requestOption, ...data})
            .then(response => {
                messages.innerHTML = 'Ваше сообщение успешно отправлено'
                comments.innerHTML += `<article
                            class="p-6 mb-3 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                         ${response.data.data.user.name}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <time pubdate datetime="{{$comment->created_at}}"
                                              title="March 12th, 2022">
                                                ${response.data.data.created_at}
                                        </time>
                                    </p>
                                </div>
                            </footer>
                            <h3 class="text-gray-500 dark:text-gray-400 font-semibold">
                             ${response.data.data.subject}
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 font-light">
                            ${response.data.data.body}
                            </p>
                        </article>`

                document.getElementById('body').value = ''
                document.getElementById('subject').value = ''

            })
            .catch(error => {
                messages.innerHTML = error.response.data.message
            });

        setTimeout(() => messages.innerHTML = '', 5000)
    });
})

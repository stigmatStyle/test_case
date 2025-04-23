let $grid;
let currentPage = 1;
let selectedFilter = 'all'; // Фильтр по умолчанию

document.addEventListener("DOMContentLoaded", function () {
    const loadMoreBtn = document.querySelector('.load-more');
    const filterBtns = document.querySelectorAll('.filter-btn');

    // Инициализация Isotope
    if (typeof $ !== 'undefined' && $.fn.imagesLoaded) {
        $('.uza-portfolio').imagesLoaded(function () {
            $grid = $('.uza-portfolio').isotope({
                itemSelector: '.single-portfolio-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.single-portfolio-item'
                }
            });
        });
    }

    // Обработчик для кнопок фильтра
    if (filterBtns) {
        filterBtns.forEach(button => {
            button.addEventListener('click', function () {
                selectedFilter = this.getAttribute('data-filter'); // Получаем выбранный фильтр
                currentPage = 1; // Сброс на первую страницу
                loadPosts(selectedFilter, currentPage); // Загружаем посты с фильтром
            });
        });
    }


    // Обработчик для кнопки Load More
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function () {
            currentPage++; // Увеличиваем номер страницы
            loadPosts(selectedFilter, currentPage); // Загружаем посты с выбранным фильтром
        });
    }


    // Инициализация загрузки постов
    loadPosts(selectedFilter, currentPage);
});

// Функция загрузки постов
function loadPosts(filter, page) {
    const data = new FormData();
    data.append('action', 'load_more_portfolio');
    data.append('paged', page);
    data.append('filter', filter); // Передаем выбранный фильтр

    fetch(custom_ajax_params.ajax_url, {
        method: 'POST',
        body: data,
    })
        .then(res => res.text())
        .then(data => {
            const container = document.getElementById('portfolio-posts');
            if (data.trim() !== '' && container) {
                if (page === 1) {
                    container.innerHTML = data; // Если это первая страница, заменяем весь контент
                } else {
                    container.insertAdjacentHTML('beforeend', data); // Добавляем новые посты
                }

                // Перезапускаем Isotope после добавления новых постов
                $grid.isotope('reloadItems').isotope();

                // Проверяем, сколько элементов вернулось
                const newItems = (data.match(/single-portfolio-item/g) || []).length;

                // Если вернулось меньше 4 постов, скрываем кнопку Load More
                if (newItems < 4) {
                    document.querySelector('.load-more').style.display = 'none';
                } else {
                    document.querySelector('.load-more').style.display = 'inline-block';
                }
            } else {
                let button = document.querySelector('.load-more');
                if (button) {
                    button.style.display = 'none';
                }

            }
        });
}

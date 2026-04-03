<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon-32x32.ico" type="image/x-icon">
    <title>Вкусный дом - Домашние рецепты</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <header class="header">
    <div class="nav-container">
        <a href="index.php" class="logo">Вкусный дом</a>

        <div class="theme-toggle" id="themeToggle">
            <span class="sun">☀️</span>
            <span class="moon">🌙</span>
            <span class="toggle-slider"></span>
        </div>

        <nav class="nav-menu">
            <a href="#recipes">Рецепты</a>
            <a href="#add-recipe">Поделиться рецептом</a>
            <a href="#menu">Меню на неделю</a>
            <a href="#reviews">Отзывы</a>
<div class="header-auth">
   

            <?php if (isset($_SESSION['user_id'])): ?>
                <span class="user-name">Привет, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a class="auth-btn logout-btn" href="logout.php">Выйти</a>
            <?php else: ?>
                <a class="auth-btn login-btn" href="login.php">Войти</a>
                <a class="auth-btn register-btn" href="register.php">Регистрация</a>
            <?php endif; ?>
        </nav>

        <div class="burger" id="burgerMenu">
            <span></span><span></span><span></span>
        </div>
    </div>

    <div class="mobile-menu" id="mobileNav">
        <u
        <ul>
            ><a href="#recipes">Рецепты</a></l/li>
            ><a href="#add-recipe">Поделиться рецептом</a></l/li>
            ><a href="#menu">Меню на неделю</a></l/li>
            ><a href="#reviews">Отзывы</a></li>

            <?php if (isset($_SESSION['user_id'])): ?>
                ><a href="logout.php">Выйти</a></li>
            <?php else: ?>
                ><a href="login.php">Войти</a></l/li>
                ><a href="register.php">Регистрация</a></li>
            <?php endif; ?>
        </ul>
    </div>
</header>
    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <h1>Домашние рецепты для всей семьи</h1>
            <p>Простые и вкусные блюда каждый день</p>
        </div>
    </section>

    <div class="container">
        <!-- Рецепты -->
        <section id="recipes">
            <h2>Популярные рецепты</h2>
            
            <!-- 🔍 Поиск -->
            <div class="search-container">
                <input type="text" class="search-input" id="searchInput" placeholder="🔍 Поиск по названию, ингредиентам...">
                <span class="search-clear" id="searchClear">✕</span>
            </div>

            <div class="categories">
                <button class="category-btn active" data-category="all">Все</button>
                <button class="category-btn" data-category="gorachie">Горячие</button>
                <button class="category-btn" data-category="salaty">Салаты</button>
                <button class="category-btn" data-category="garniry">Гарниры</button>
            </div>

            <div class="recipes-grid">
                <!-- РЕЦЕПТ 1: Гарнир -->
                <div class="recipe-card" 
                     data-category="garniry"
                    data-price="70"  
                     data-base-portions="4"
                     data-search="картошка овощи картофель перец лук масло"
                     data-title="Жареная картошка с овощами"
                     onclick="flipCard(this)">
                    <div class="recipe-flip">
                        <div class="recipe-front">
                            <img src="kartoshka.jpeg" alt="Жареная картошка" class="recipe-img">
                            <h3 class="recipe-title">Жареная картошка с овощами</h3>
                            <div class="recipe-meta">
                                <div class="recipe-time">
                                    <span>🕒</span><span>25 минут</span>
                                </div>
                                <div class="rating-container" data-recipe-id="1">
                                    <span class="rating-stars" data-rating="4.5">★★★★☆</span>
                                    <span class="rating-count">(12)</span>
                                </div>
                            </div>
                        </div>
                        <div class="recipe-back">
                            <div class="portions-control">
                                <div class="share-buttons">
    <button class="share-btn" onclick="shareRecipe(1)">Поделиться</button>
</div>
                                <label>Порции: </label>
                                <select class="portions-select" data-recipe-id="1">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected>4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <h3>🍟 Ингредиенты:</h3>
                            <ul class="ingredients" data-recipe-id="1">
                                <li data-amount="4">4 средние картофелины</li>
                                <li data-amount="1">1 болгарский перец</li>
                                <li data-amount="1">1 луковица</li>
                                <li data-amount="2">2 ст.л. растительного масла</li>
                                <li>Соль, специи по вкусу</li>
                            </ul>
                            <h3>👨‍🍳 Приготовление:</h3>
                            <div class="instructions">
                                1. Картофель нарезать соломкой, замочить 15 мин<br>
                                2. Лук и перец нарезать кубиками<br>
                                3. Обжарить овощи 5 мин<br>
                                4. Добавить картофель, жарить 15 мин
                            </div>
                            <button class="confetti-btn" onclick="launchConfetti()">🎉 Рецепт готов!</button>
                        </div>
                    </div>
                </div>

                <!-- РЕЦЕПТ 2: Горячее -->
                <div class="recipe-card" 
                     data-category="gorachie"
                     data-price="220" 
                     data-base-portions="4"
                     data-search="курица сливки соус филе лук чеснок"
                     data-title="Курица в сливочном соусе"
                     onclick="flipCard(this)">
                    <div class="recipe-flip">
                        <div class="recipe-front">
                            <img src="kurica.png" alt="Курица" class="recipe-img">
                            <h3 class="recipe-title">Курица в сливочном соусе</h3>
                            <div class="recipe-meta">
                                <div class="recipe-time">
                                    <span>🕒</span><span>35 минут</span>
                                </div>
                                <div class="rating-container" data-recipe-id="2">
                                    <span class="rating-stars" data-rating="4.8">★★★★★</span>
                                    <span class="rating-count">(25)</span>
                                </div>
                            </div>
                        </div>
                        <div class="recipe-back">
                            <div class="portions-control">
                                <div class="share-buttons">
    <button class="share-btn" onclick="shareRecipe(1)">Поделиться</button>
</div>
                                <label>Порции: </label>
                                <select class="portions-select" data-recipe-id="2">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected>4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <h3>🍗 Ингредиенты:</h3>
                            <ul class="ingredients" data-recipe-id="2">
                                <li data-amount="500">500г куриного филе</li>
                                <li data-amount="200">200мл сливок 20%</li>
                                <li data-amount="1">1 луковица</li>
                                <li data-amount="2">2 зубчика чеснока</li>
                                <li>Соль, перец, зелень</li>
                            </ul>
                            <h3>👨‍🍳 Приготовление:</h3>
                            <div class="instructions">
                                1. Курицу обжарить 7 мин<br>
                                2. Добавить лук и чеснок<br>
                                3. Влить сливки, тушить 15 мин<br>
                                4. Добавить зелень
                            </div>
                             <button class="confetti-btn" onclick="launchConfetti()">🎉 Рецепт готов!</button>
                        </div>
                    </div>
                </div>

                <!-- РЕЦЕПТ 3: Салат -->
                <div class="recipe-card" 
                     data-category="salaty"
                      data-price="180" 
                     data-base-portions="4"
                     data-search="цезарь салат курица пармезан романо заправка крутоны"
                     data-title="Салат Цезарь домашний"
                     onclick="flipCard(this)">
                    <div class="recipe-flip">
                        <div class="recipe-front">
                            <img src="cesar.jpeg" alt="Салат" class="recipe-img">
                            <h3 class="recipe-title">Салат Цезарь домашний</h3>
                            <div class="recipe-meta">
                                <div class="recipe-time">
                                    <span>🕒</span><span>20 минут</span>
                                </div>
                                <div class="rating-container" data-recipe-id="3">
                                    <span class="rating-stars" data-rating="4.2">★★★★☆</span>
                                    <span class="rating-count">(18)</span>
                                </div>
                            </div>
                        </div>
                        <div class="recipe-back">
                            <div class="portions-control">
                                <div class="share-buttons">
    <button class="share-btn" onclick="shareRecipe(1)">Поделиться</button>
</div>
                                <label>Порции: </label>
                                <select class="portions-select" data-recipe-id="3">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected>4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <h3>🥗 Ингредиенты:</h3>
                            <ul class="ingredients" data-recipe-id="3">
                                <li data-amount="200">200г куриного филе</li>
                                <li data-amount="1">1 кочан салата романо</li>
                                <li data-amount="50">50г пармезана</li>
                                <li data-amount="2">2 ст.л. заправки цезарь</li>
                                <li>Крутоны</li>
                            </ul>
                            <h3>👨‍🍳 Приготовление:</h3>
                            <div class="instructions">
                                1. Курицу обжарить до корочки<br>
                                2. Салат порвать руками<br>
                                3. Смешать ингредиенты<br>
                                4. Посыпать сыром
                            </div>
                            <button class="confetti-btn" onclick="launchConfetti()">🎉 Рецепт готов!</button>
                        </div>
                    </div>
                </div>
                <!-- РЕЦЕПТ 4: Горячее/Суп -->
<div class="recipe-card" 
     data-category="gorachie"
     data-price="120"  
     data-base-portions="6"
     data-search="борщ свекла мясо капуста картофель морковь"
     data-title="Борщ классический"
     onclick="flipCard(this)">
    <div class="recipe-flip">
        <div class="recipe-front">
            <img src="borshi.jpeg" alt="Борщ" class="recipe-img">
            <h3 class="recipe-title">Борщ классический</h3>
            <div class="recipe-meta">
                <div class="recipe-time">
                    <span>🕒</span><span>90 минут</span>
                </div>
                <div class="rating-container" data-recipe-id="4">
                    <span class="rating-stars" data-rating="4.9">★★★★★</span>
                    <span class="rating-count">(156)</span>
                </div>
            </div>
        </div>
        <div class="recipe-back">
            <div class="portions-control">
                <div class="share-buttons">
                    <button class="share-btn" onclick="shareRecipe(4)">📱 Поделиться</button>
                </div>
                <label>Порции: </label>
                <select class="portions-select" data-recipe-id="4">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="6" selected>6</option>
                </select>
            </div>
            <h3>🥣 Ингредиенты:</h3>
            <ul class="ingredients" data-recipe-id="4">
                <li data-amount="400">400г говядины</li>
                <li data-amount="2">2 свеклы</li>
                <li data-amount="300">300г капусты</li>
                <li data-amount="4">4 картофелины</li>
                <li data-amount="2">2 моркови</li>
                <li data-amount="1">1 лук</li>
                <li data-amount="2">2 ст.л. томатной пасты</li>
                <li>Сметана, зелень</li>
            </ul>
            <h3>👨‍🍳 Приготовление:</h3>
            <div class="instructions">
                1. Сварить мясной бульон 1 час<br>
                2. Обжарить свеклу с томатом<br>
                3. Добавить овощи, варить 25 мин<br>
                4. Заправить чесноком и зеленью
            </div>
            <button class="confetti-btn" onclick="launchConfetti()">🎉 Рецепт готов!</button>
        </div>
    </div>
</div>
                <!-- РЕЦЕПТ 5: Горячее -->
<div class="recipe-card" 
     data-category="gorachie"
     data-price="95"  
     data-base-portions="4"
     data-search="пельмени тесто мясо фарш лук яйцо"
     data-title="Пельмени домашние"
     onclick="flipCard(this)">
    <div class="recipe-flip">
        <div class="recipe-front">
            <img src="pelmeni.jpg" alt="Пельмени" class="recipe-img">
            <h3 class="recipe-title">Пельмени домашние</h3>
            <div class="recipe-meta">
                <div class="recipe-time">
                    <span>🕒</span><span>120 минут</span>
                </div>
                <div class="rating-container" data-recipe-id="5">
                    <span class="rating-stars" data-rating="4.7">★★★★★</span>
                    <span class="rating-count">(89)</span>
                </div>
            </div>
        </div>
        <div class="recipe-back">
            <div class="portions-control">
                <div class="share-buttons">
                    <button class="share-btn" onclick="shareRecipe(5)">📱 Поделиться</button>
                </div>
                <label>Порции: </label>
                <select class="portions-select" data-recipe-id="5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4" selected>4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <h3>🥟 Ингредиенты:</h3>
            <ul class="ingredients" data-recipe-id="5">
                <li data-amount="500">500г муки</li>
                <li data-amount="1">1 яйцо</li>
                <li data-amount="200">200мл воды</li>
                <li data-amount="400">400г фарша</li>
                <li data-amount="1">1 лук</li>
                <li>Соль, перец</li>
            </ul>
            <h3>👨‍🍳 Приготовление:</h3>
            <div class="instructions">
                1. Замесить тесто, отдохнуть 30 мин<br>
                2. Смешать фарш с луком<br>
                3. Лепить пельмени<br>
                4. Варить 7 минут
            </div>
            <button class="confetti-btn" onclick="launchConfetti()">🎉 Рецепт готов!</button>
        </div>
    </div>
</div>
            <!-- РЕЦЕПТ 6: Салат -->
<div class="recipe-card" 
     data-category="salaty"
     data-price="85"  
     data-base-portions="6"
     data-search="оливье картофель морковь колбаса яйцо майонез"
     data-title="Оливье классический"
     onclick="flipCard(this)">
    <div class="recipe-flip">
        <div class="recipe-front">
            <img src="olive.jpg" alt="Оливье" class="recipe-img">
            <h3 class="recipe-title">Оливье классический</h3>
            <div class="recipe-meta">
                <div class="recipe-time">
                    <span>🕒</span><span>40 минут</span>
                </div>
                <div class="rating-container" data-recipe-id="6">
                    <span class="rating-stars" data-rating="4.6">★★★★☆</span>
                    <span class="rating-count">(234)</span>
                </div>
            </div>
        </div>
        <div class="recipe-back">
            <div class="portions-control">
                <div class="share-buttons">
                    <button class="share-btn" onclick="shareRecipe(6)">📱 Поделиться</button>
                </div>
                <label>Порции: </label>
                <select class="portions-select" data-recipe-id="6">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="6" selected>6</option>
                </select>
            </div>
            <h3>🥗 Ингредиенты:</h3>
            <ul class="ingredients" data-recipe-id="6">
                <li data-amount="4">4 картофелины</li>
                <li data-amount="3">3 моркови</li>
                <li data-amount="4">4 яйца</li>
                <li data-amount="300">300г колбасы</li>
                <li data-amount="200">200г горошка</li>
                <li data-amount="150">150г майонеза</li>
            </ul>
            <h3>👨‍🍳 Приготовление:</h3>
            <div class="instructions">
                1. Отварить овощи и яйца<br>
                2. Нарезать кубиками<br>
                3. Заправить майонезом<br>
                4. Настояться 2 часа
            </div>
            <button class="confetti-btn" onclick="launchConfetti()">🎉 Рецепт готов!</button>
        </div>
    </div>
</div>

            </div>
        </section>

        <!-- Меню на неделю -->
        <section id="menu" class="weekly-menu styled-section">
            <h2>Меню на неделю</h2>
            <div class="days-grid">
                <div class="day-menu">
                    <div class="day-title">Понедельник</div>
                    <p>Борщ домашний</p><p>Котлеты с пюре</p>
                </div>
                <div class="day-menu">
                    <div class="day-title">Вторник</div>
                    <p>Суп с фрикадельками</p><p>Жареная картошка</p>
                </div>
                <div class="day-menu">
                    <div class="day-title">Среда</div>
                    <p>Куриный суп</p><p>Курица в соусе</p>
                </div>
                <div class="day-menu">
                    <div class="day-title">Четверг</div>
                    <p>Овощной суп</p><p>Рыба на пару</p>
                </div>
                <div class="day-menu">
                    <div class="day-title">Пятница</div>
                    <p>Гороховый суп</p><p>Пельмени домашние</p>
                </div>
                <div class="day-menu">
                    <div class="day-title">Суббота</div>
                    <p>Салат Цезарь</p><p>Шашлык из свинины</p>
                </div>
                <div class="day-menu">
                    <div class="day-title">Воскресенье</div>
                    <p>Уха по-фински</p><p>Плов домашний</p>
                </div>
            </div>
        </section>

                <!-- ➕ ДОБАВИТЬ РЕЦЕПТ -->
        <section id="add-recipe" class="add-recipe-section styled-section">
            <div class="container">
                <h2>Поделитесь своим рецептом!</h2>
                <form class="recipe-form" id="recipeForm">
                    <div class="form-group">
                        <label>Название блюда:</label>
                        <input type="text" id="recipeTitle" placeholder="Например: Блинчики по-домашнему" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Время (мин):</label>
                            <input type="number" id="recipeTime" placeholder="30" min="5" max="240" required>
                        </div>
                        <div class="form-group">
                            <label>Порции:</label>
                            <select id="recipePortions">
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ингредиенты (по одному):</label>
                        <textarea id="recipeIngredients" rows="4" placeholder="500г муки&#10;2 яйца&#10;1л молока"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Приготовление:</label>
                        <textarea id="recipeInstructions" rows="5" placeholder="1. Смешать&#10;2. Жарить..."></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Опубликовать!</button>
                </form>
                <div id="userRecipes" class="user-recipes-grid"></div>
            </div>
        </section>

<!-- ⭐ ОТЗЫВЫ С ФОРМОЙ -->
<section id="reviews" class="reviews-section styled-section">
    <div class="container">
        <h2>Отзывы</h2>
        
        <!-- 📝 ФОРМА ОТЗЫВА -->
        <form class="review-form" id="reviewForm">
            <div class="form-row">
                <div class="form-group">
                    <label>Ваше имя:</label>
                    <input type="text" id="reviewName" placeholder="Иван Иванов" required>
                </div>
                <div class="form-group">
                    <label>Оценка:</label>
                    <select id="reviewRating">
                        <option value="5">★★★★★ 5</option>
                        <option value="4" selected>★★★★☆ 4</option>
                        <option value="3">★★★☆☆ 3</option>
                        <option value="2">★★☆☆☆ 2</option>
                        <option value="1">★☆☆☆☆ 1</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Отзыв:</label>
                <textarea id="reviewText" rows="4" placeholder="Что вам понравилось в рецептах? 😊" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Опубликовать отзыв!</button>
            <section id="reviews">
<h2>Отзывы</h2>
<p style="text-align: center; font-size: 1.2rem; color: #4ECDC4;">Скоро здесь будут ваши отзывы!</p>
</section>
        </form>
        <div style="height: 100px;"></div>

<!-- 🏠 НОВЫЙ ФУТЕР - ЗАМЕНИТЕ ВСЁ ПОСЛЕ ОТЗЫВОВ -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <!-- 🍳 Логотип + Описание -->
            <div class="footer-brand">
                <a href="#" class="footer-logo">Вкусный дом</a>
                <p>Домашние рецепты для всей семьи. Простые и вкусные блюда каждый день!</p>
                <div class="social-links">
                    <a href="#" aria-label="TikTok">📱</a>
                    <a href="#" aria-label="Instagram">📸</a>
                    <a href="#" aria-label="Telegram">💬</a>
                </div>
            </div>

            <!-- 📂 Быстрое меню -->
            <div class="footer-menu">
                <h4>Рецепты</h4>
                <ul>
                    <li><a href="#recipes">Популярные</a></li>
                    <li><a href="#gorachie">Горячие блюда</a></li>
                    <li><a href="#salaty">Салаты</a></li>
                    <li><a href="#garniry">Гарниры</a></li>
                </ul>
            </div>

            <!-- 📅 Меню + Формы -->
            <div class="footer-menu">
                <h4>Полезное</h4>
                <ul>
                    <li><a href="#menu">Меню на неделю</a></li>
                    <li><a href="#add-recipe">Добавить рецепт</a></li>
                    <li><a href="#reviews">Отзывы</a></li>
                </ul>
            </div>

            <!-- 📧 Контакты -->
            <div class="footer-contacts">
                <h4>Связаться</h4>
                <div class="contact-item">
                    <span>📍</span>
                    <p>г. Кемерово, ул. Куливая 25</p>
                </div>
                <div class="contact-item">
                    <span>📧</span>
                    <p>info@vkusniydom.ru</p>
                </div>
                <div class="contact-item">
                    <span>📱</span>
                    <p>+7 (999) 123-45-67</p>
                </div>
            </div>
        </div>

        <!-- 📄 Нижняя полоса -->
        <div class="footer-bottom">
            <p>&copy; 2026 Вкусный дом. Все рецепты для счастливой семьи ❤️</p>
            <div class="footer-links">
                <a href="#">Политика конфиденциальности</a>
                <a href="#">Условия использования</a>
            </div>
        </div>
    </div>
</footer>

                
    <script>
// 🌙 ТЕМА С ПОЛЗУНКОМ - ПОЛНАЯ АНИМАЦИЯ
const themeToggle = document.getElementById('themeToggle');
const body = document.body;

if (themeToggle) {
    // Загрузка темы
    const savedTheme = localStorage.getItem('theme') || 'light';
    body.setAttribute('data-theme', savedTheme);
    
    // Обновление ползунка при загрузке
    updateThemeToggle(savedTheme);
    
    // Переключение
    themeToggle.addEventListener('click', () => {
        const currentTheme = body.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        
        body.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateThemeToggle(newTheme);
    });
}

function updateThemeToggle(theme) {
    if (theme === 'dark') {
        themeToggle.classList.add('dark-theme');
    } else {
        themeToggle.classList.remove('dark-theme');
    }
}


// 🍔 БУРГЕР - ИСПРАВЛЕННЫЕ ID
const burger = document.getElementById('burgerMenu');
const mobileNav = document.getElementById('mobileNav');
if (burger && mobileNav) {
    burger.addEventListener('click', (e) => {
        e.stopPropagation();
        burger.classList.toggle('active');
        mobileNav.classList.toggle('active');
        body.classList.toggle('menu-open');
    });
    
    document.querySelectorAll('.mobile-menu a').forEach(link => {
        link.addEventListener('click', () => {
            burger.classList.remove('active');
            mobileNav.classList.remove('active');
            body.classList.remove('menu-open');
        });
    });
}

// 🔍 ПОИСК И ФИЛЬТРЫ - ПОЛНАЯ РАБОТА
const searchInput = document.getElementById('searchInput');
const searchClear = document.getElementById('searchClear');
const recipeCards = document.querySelectorAll('.recipe-card');

function performSearch() {
    const query = searchInput.value.toLowerCase().trim();
    
    recipeCards.forEach(card => {
        const title = card.dataset.title?.toLowerCase() || '';
        const searchTerms = card.dataset.search?.toLowerCase() || '';
        
        if (query === '' || title.includes(query) || searchTerms.includes(query)) {
            card.classList.remove('search-hidden');
            card.style.display = '';
        } else {
            card.classList.add('search-hidden');
            card.style.display = 'none';
        }
    });
    
    if (searchClear) searchClear.style.display = query ? 'block' : 'none';
}

if (searchInput) searchInput.addEventListener('input', performSearch);
if (searchClear) searchClear.addEventListener('click', () => {
    searchInput.value = '';
    performSearch();
});

// ФИЛЬТРЫ КАТЕГОРИЙ
const categoryBtns = document.querySelectorAll('.category-btn');
categoryBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        categoryBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const category = btn.dataset.category;
        
        recipeCards.forEach(card => {
            const cardCategory = card.dataset.category;
            if ((category === 'all' || cardCategory === category) && 
                !card.classList.contains('search-hidden')) {
                card.classList.remove('hidden');
                card.style.display = '';
            } else {
                card.classList.add('hidden');
                card.style.display = 'none';
            }
        });
    });
});

// Остальные функции (flipCard, shareRecipe, etc.)
function flipCard(card) {
    const flip = card.querySelector('.recipe-flip');
    flip?.classList.toggle('flipped');
}

function shareRecipe(recipeId) {
    const recipeTitle = document.querySelector(`[data-recipe-id="${recipeId}"] .recipe-title`)?.textContent || 'Рецепт';
    const text = `🍳 Готовлю: ${recipeTitle} из Вкусный дом!`;
    navigator.clipboard.writeText(text).then(() => alert('✅ Скопировано: ' + text));
}



        // Смена порций
        document.querySelectorAll('.portions-select').forEach(select => {
            select.addEventListener('change', function() {
                const recipeId = this.dataset.recipeId;
                const portions = parseInt(this.value);
                const basePortions = parseInt(document.querySelector(`[data-recipe-id="${recipeId}"`).closest('.recipe-card').dataset.basePortions);
                const ratio = portions / basePortions;

                document.querySelectorAll(`[data-recipe-id="${recipeId}"] [data-amount]`).forEach(item => {
                    const baseAmount = parseFloat(item.dataset.amount);
                    if (!isNaN(baseAmount)) {
                        const newAmount = (baseAmount * ratio).toFixed(baseAmount % 1 === 0 ? 0 : 1);
                        item.textContent = item.textContent.replace(/^\d+(\.\d+)?/, newAmount);
                    }
                });
            });
        });

        // Плавная прокрутка
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                target?.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });

        // ➕ Добавление рецептов
// ============================================
// ➕ ПОЛНАЯ СИСТЕМА РЕЦЕПТОВ ПОЛЬЗОВАТЕЛЕЙ
// ============================================

const recipeForm = document.getElementById('recipeForm');
const userRecipes = document.getElementById('userRecipes');

// 📝 ДОБАВЛЕНИЕ НОВОГО РЕЦЕПТА
recipeForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const newRecipe = {
        id: Date.now(),
        title: document.getElementById('recipeTitle').value,
        time: document.getElementById('recipeTime').value + ' минут',
        portions: document.getElementById('recipePortions').value,
        ingredients: document.getElementById('recipeIngredients').value
            .split('\n').filter(i => i.trim()),
        instructions: document.getElementById('recipeInstructions').value
            .split('\n').filter(i => i.trim())
    };
    
    // Сохраняем в localStorage (макс. 10 рецептов)
    let recipes = JSON.parse(localStorage.getItem('userRecipes') || '[]');
    recipes.unshift(newRecipe);
    localStorage.setItem('userRecipes', JSON.stringify(recipes.slice(0, 10)));
    
    // Очищаем и обновляем
    recipeForm.reset();
    showUserRecipes();
    alert('✅ Рецепт добавлен и сохранён!');
});

// 🗑️ УДАЛЕНИЕ РЕЦЕПТА
function deleteRecipe(index) {
    let recipes = JSON.parse(localStorage.getItem('userRecipes') || '[]');
    recipes.splice(index, 1);
    localStorage.setItem('userRecipes', JSON.stringify(recipes));
    showUserRecipes();
    alert('🗑️ Рецепт удалён!');
}

// 📋 ПОКАЗ ВСЕХ РЕЦЕПТОВ С КНОПКАМИ УДАЛЕНИЯ
function showUserRecipes() {
    const recipes = JSON.parse(localStorage.getItem('userRecipes') || '[]');
    userRecipes.innerHTML = recipes.length ? '' : 
        '<p style="text-align: center; color: #666;">Добавьте первый рецепт!</p>';
    
    recipes.forEach((recipe, index) => {
        const card = document.createElement('div');
        card.className = 'user-recipe-card';
        card.innerHTML = `
            <button class="delete-btn" onclick="deleteRecipe(${index})">🗑️</button>
            <h3>${recipe.title}</h3>
            <p><strong>🕒 ${recipe.time} | 🍽️ ${recipe.portions} порций</strong></p>
            <h4>🍲 Ингредиенты:</h4>
            <ul>${recipe.ingredients.map(ing => `<li>${ing}</li>`).join('')}</ul>
            <h4>👨‍🍳 Приготовление:</h4>
            <div>${recipe.instructions.map(step => `<p>• ${step}</p>`).join('')}</div>
        `;
        userRecipes.appendChild(card);
    });
}

// 🔄 ЗАГРУЗКА ПРИ СТАРТЕ СТРАНИЦЫ
showUserRecipes();

    
    recipes.forEach((recipe, index) => {
        const card = document.createElement('div');
        card.className = 'user-recipe-card';
        card.setAttribute('data-recipe-index', index); // ← ID для удаления
        card.innerHTML = `
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <h3>${recipe.title}</h3>
                <button class="delete-btn" onclick="deleteRecipe(${index})">🗑️</button>
            </div>
            <p><strong>🕒 ${recipe.time} | 🍽️ ${recipe.portions} порций</strong></p>
            <h4>🍲 Ингредиенты:</h4>
            <ul>${recipe.ingredients.map(ing => `<li>${ing}</li>`).join('')}</ul>
            <h4>👨‍🍳 Приготовление:</h4>
            <div>${recipe.instructions.map(step => `<p>• ${step}</p>`).join('')}</div>
        `;
        userRecipes.appendChild(card);
    });


showUserRecipes();

        // 📱 Поделиться рецептом ← НОВОЕ!!!
        function shareRecipe(recipeId) {
            const recipeTitle = document.querySelector(`[data-recipe-id="${recipeId}"] .recipe-title`)?.textContent || 'Рецепт';
            const text = `🍳 Готовлю: ${recipeTitle} из Вкусный дом!`;
            
            if (navigator.share) {
                navigator.share({
                    title: recipeTitle,
                    text: text,
                    url: window.location.href
                });
            } else {
                navigator.clipboard.writeText(text).then(() => {
                    alert('✅ Скопировано в буфер: ' + text);
                });
            }
        }
        // 🎉 Конфетти!
function launchConfetti() {
  const canvas = document.createElement('canvas');
  canvas.id = 'confetti-canvas';
  canvas.style.cssText = 'position:fixed;top:0;left:0;width:100vw;height:100vh;pointer-events:none;z-index:9999';
  document.body.appendChild(canvas);
  
  const ctx = canvas.getContext('2d');
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  
  const particles = [];
  const colors = ['#FF6B6B', '#4ECDC4', '#FFD700', '#FF69B4', '#45B7D1'];
  
  // Создаем 100 частиц
  for(let i = 0; i < 100; i++) {
    particles.push({
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height * -0.5,
      vx: (Math.random() - 0.5) * 8,
      vy: Math.random() * 4 + 2,
      size: Math.random() * 6 + 3,
      color: colors[Math.floor(Math.random() * colors.length)],
      rotation: Math.random() * 360,
      rotSpeed: (Math.random() - 0.5) * 10
    });
  }
  
  function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach((p, i) => {
      p.x += p.vx;
      p.y += p.vy;
      p.vy += 0.05; // Гравитация
      p.rotation += p.rotSpeed;
      
      ctx.save();
      ctx.translate(p.x, p.y);
      ctx.rotate(p.rotation * Math.PI / 180);
      ctx.fillStyle = p.color;
      ctx.fillRect(-p.size/2, -p.size/2, p.size, p.size);
      ctx.restore();
      
      if(p.y > canvas.height) particles.splice(i, 1);
    });
    
    if(particles.length > 0) requestAnimationFrame(animate);
    else setTimeout(() => canvas.remove(), 100);
  }
  animate();
}

// ⭐ ОТЗЫВЫ ПОЛЬЗОВАТЕЛЕЙ
const reviewForm = document.getElementById('reviewForm');
const reviewsList = document.getElementById('reviewsList');

reviewForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const newReview = {
        id: Date.now(),
        name: document.getElementById('reviewName').value,
        rating: document.getElementById('reviewRating').value,
        text: document.getElementById('reviewText').value,
        date: new Date().toLocaleDateString('ru-RU')
    };
    
    let reviews = JSON.parse(localStorage.getItem('reviews') || '[]');
    reviews.unshift(newReview);
    localStorage.setItem('reviews', JSON.stringify(reviews.slice(0, 20))); // Макс 20 отзывов
    
    reviewForm.reset();
    showReviews();
    alert('✅ Отзыв опубликован!');
});

function showReviews() {
    const reviews = JSON.parse(localStorage.getItem('reviews') || '[]');
    reviewsList.innerHTML = reviews.length ? '' : 
        '<p style="text-align: center; color: #666; grid-column: 1/-1;">Будьте первым! Оставьте отзыв 😊</p>';
    
    reviews.forEach(review => {
        const card = document.createElement('div');
        card.className = 'review-card';
        card.innerHTML = `
            <div class="review-header">
                <div>
                    <div class="review-stars">${'★'.repeat(review.rating)}${'☆'.repeat(5-review.rating)}</div>
                    <div class="review-author">${review.name}</div>
                </div>
                <div class="review-date">${review.date}</div>
            </div>
            <p>"${review.text}"</p>
        `;
        reviewsList.appendChild(card);
    });
}

showReviews(); // Загрузка при старте
    </script>
</body>
</html>

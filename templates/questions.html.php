<!-- Header for the Questions Page -->
<div class="page-header">
    <h1 class="page-title">All Questions</h1>
    <a href="ask_question.php" class="btn btn-ask-question">Ask Question</a>
</div>

<!-- Filtering/Ordering Controls -->
<div class="question-filters">
    <!-- In a real application, you'd use PHP to check the URL's query parameter
         (e.g., $_GET['sort']) and apply the 'active' class accordingly. -->
    <a href="?sort=newest" class="filter-item active">Newest</a>
    <a href="?sort=trending" class="filter-item">Trending</a>
    <a href="?sort=unanswered" class="filter-item">Unanswered</a>
    <a href="?sort=oldest" class="filter-item">Oldest</a>
</div>

<!-- Container for the list of all questions -->
<div class="question-list">
    
    <!-- Example Question 1 (with answers) -->
    <div class="question-summary">
        <div class="question-stats">
            <div class="stat-item">
                <span>15</span> votes
            </div>
            <div class="stat-item answer-count has-answers">
                <span>4</span> answers
            </div>
            <div class="stat-item">
                <span>2.1k</span> views
            </div>
        </div>
        <div class="question-details">
            <h2 class="question-title">
                <a href="/questions/1">How do I vertically align a div inside another div using only CSS Flexbox?</a>
            </h2>
            <p class="question-excerpt">I'm trying to center a child div within a parent container both horizontally and vertically. I have `display: flex` on the parent, but `align-items: center` isn't working as I expected...</p>
            <div class="question-meta">
                <div class="question-tags">
                    <a href="/tags/css" class="tag">css</a>
                    <a href="/tags/flexbox" class="tag">flexbox</a>
                    <a href="/tags/layout" class="tag">layout</a>
                </div>
                <div class="question-author">
                    asked 12 mins ago by <a href="/users/101">Alex Student</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Example Question 2 (unanswered) -->
    <div class="question-summary">
        <div class="question-stats">
            <div class="stat-item">
                <span>-2</span> votes
            </div>
            <div class="stat-item answer-count">
                <span>0</span> answers
            </div>
            <div class="stat-item">
                <span>38</span> views
            </div>
        </div>
        <div class="question-details">
            <h2 class="question-title">
                <a href="/questions/2">What is the best way to handle asynchronous API calls in PHP for a user dashboard?</a>
            </h2>
            <p class="question-excerpt">My dashboard needs to load data from multiple external APIs without blocking the page load. Should I use cURL, Guzzle, or something with JavaScript on the front-end like Fetch or Axios?</p>
            <div class="question-meta">
                <div class="question-tags">
                    <a href="/tags/php" class="tag">php</a>
                    <a href="/tags/javascript" class="tag">javascript</a>
                    <a href="/tags/api" class="tag">api</a>
                </div>
                <div class="question-author">
                    asked 58 mins ago by <a href="/users/204">Ben Coder</a>
                </div>
            </div>
        </div>
    </div>

</div>

        <div class="pagelist">
            <div class="prev">
                <form class="pageSwitcherForm" action="">
                    <input value="{{ lang.prev }}" type="submit">
                </form>
            </div>
            <div class="pages">
                {% for i in board.startPageCountAt..board.pageCount %}
                    [{{ i }}]
                {% endfor %}
            </div>
            <div class="next">
                <form class="pageSwitcherForm" action="">
                    <input value="{{ lang.next }}" type="submit">
                </form>
            </div>
            <div class="pages cataloglink">
                <a href="catalog.html">{{ lang.catalog }}</a>
            </div>
        </div>
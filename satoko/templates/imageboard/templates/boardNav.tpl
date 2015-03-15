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
            {% if board.catalogFile is not null %}
            <div class="pages cataloglink">
                <a href="{{ board.catalogFile }}">{{ lang.catalog }}</a>
            </div>
            {% endif %}
        </div>
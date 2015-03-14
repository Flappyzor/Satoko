        <div id="boardNavDesktop">
            {% if board.boardList|length > 0 %}
                {% for boardCategory in board.boardList %}
                    [<!--
                    {% for boardId in boardCategory %}
                        {% if not loop.first %}
                            /
                        {% endif %}
                        {% if boardId is iterable %}
                            {% if loop.first %}
                                --><!--
                            {% endif %}
                            {% for boardTitle, boardLink in boardId %}
                                {% if loop.first %}-->{% endif %}<a href="{{ boardLink }}">{{ boardTitle }}</a>
                            {% endfor %}
                            {% if loop.last %}
                                <!--
                            {% endif %}
                        {% else %}
                            {% if loop.first %}-->{% endif %}<a href="/{{ boardId }}/">{{ boardId }}</a>{% if loop.last %}<!--{% endif %}
                        {% endif %}
                    {% endfor %}
                    -->]
                {% endfor %}
            {% endif %}
            <span id="navtopright">
                [<a href="manage.php" target="_top">{{ lang.manage }}</a>]
                [<a href="../" target="_top">{{ lang.home }}</a>]
            </span>
        </div>
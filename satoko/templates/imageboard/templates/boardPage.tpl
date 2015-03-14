        <form name="delform" id="delform" action="{{ server.PHP_SELF }}" method="post">
            <div class="board">
                
            </div>
            <div class="bottomCtrl">
                <div class="deleteForm">
                    <input name="mode" value="usrdel" type="hidden">{{ lang.deletePost }}
                    [<input name="onlyimgdel" value="on" type="checkbox" />{{ lang.fileOnly }}]
                    {{ lang.password }} 
                    <input id="delPassword" name="pwd" type="password" />
                </div>
                {% include 'styleSwitcher.tpl' %}
            </div>
        </form>
        {% include 'boardNav.tpl' %}
        {% include 'boardList.tpl' %}

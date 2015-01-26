        <div class="stylechanger">
            {{ lang.style }}
            <select id="styleSelector">
                {% for styleName, styleLink in board.stylesheets %}
                    <option>{{ styleName }}</option>
                {% endfor %}
            </select>
        </div>
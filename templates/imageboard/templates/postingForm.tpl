        <hr class="abovePostForm" />
        <div class="navLinks">
            {% if configuration.catalogFile is not null %}
                [<a href="./{{ configuration.catalogFile }}">{{ lang.catalog }}</a>]
            {% endif %}
            [<a href="{{ server.PHP_SELF }}">{{ lang.refresh }}</a>]
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ server.PHP_SELF }}" name="post">
            <table id="postForm" class="postForm">
                <tr>
                    <td>{{ lang.name }}</td>
                    <td><input name="name" type="text" /></td>
                </tr>
                <tr>
                    <td>{{ lang.email }}</td>
                    <td><input name="email" type="text" /></td>
                </tr>
                <tr>
                    <td>{{ lang.subject }}</td>
                    <td><input name="sub" type="text" /><input value="{{ lang.submit }}" type="submit" name="submit" /></td>
                </tr>
                <tr>
                    <td>{{ lang.comment }}</td>
                    <td><textarea name="com" cols="48" rows="4" wrap="soft"></textarea></td>
                </tr>
                <tr>
                    <td>{{ lang.verification }}</td>
                    <td><img src="http://i.oniichan.me/78_oDrNz.png" alt="fake captcha" /><br /><input type="text" /></td>
                </tr>
                <tr>
                    <td>{{ lang.file }}</td>
                    <td>
                        <input id="postFile" name="upfile" type="file" />
                        {% if configuration.enableSpoiler or configuration.allowNoImg %}
                        <div>
                            {% if configuration.enableSpoiler %}
                            [<label><input name="spoiler" value="on" type="checkbox">{{ lang.spoilerq }}</label>]
                            {% endif %}
                            {% if configuration.allowNoImg %}
                            [<label><input name="nofile" value="on" type="checkbox">{{ lang.nofileq }}</label>]
                            {% endif %}
                        </div>
                        {% endif %}
                    </td>
                </tr>
                <tr>
                    <td>{{ lang.password }}</td>
                    <td><input id="postPassword" name="pwd" type="password" /> <span class="password">{{ lang.password_sub }}</span></td>
                </tr>
                <tr class="rules">
                    <td colspan="2">
                        <ul class="rules">
                            {% if board.rules|length > 0 %}
                                {% for rule in board.rules %}
                                    <li>{{ include(template_from_string(rule)) }}</li>
                                {% endfor %}
                            {% endif %}
                        </ul>
                    </td>
                </tr>
            </table>
        </form>

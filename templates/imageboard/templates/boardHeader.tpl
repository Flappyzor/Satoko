<!DOCTYPE html>
<html>
    <head>
        <meta charset="{{ configuration.charset }}" />
        <title>{{ configuration.boardTitle }}</title>
        {% for styleName, styleLink in board.stylesheets %}
            <link rel="stylesheet" type="text/css" title="{{ styleName }}" href="{{ board.stylesPath }}{{ styleLink }}"{% if not loop.first %} disabled="true"{% endif %} />
        {% endfor %}
        {#<script type="text/javascript" charset="{{ charset }}" src="[CONF]satokojs[/CONF]"></script>#}
        <meta name="description" content="{{ configuration.boardDescription }}" />
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Thu, 01 Jan 1970 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />
    </head>
    <body>
        <div id="top"></div>
        {% include 'boardList.tpl' %}
        <div class="boardBanner">
            <img src="{{ configuration.boardImage }}" alt="{{ configuration.boardTitle }}" />
            <div class="boardTitle">
                {{ configuration.boardTitle }}
            </div>
            <div class="boardSubtitle">
                {{ configuration.boardSubtitle }}
            </div>
        </div>
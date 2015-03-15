<!DOCTYPE html>
<html>
    <head>
        <meta charset="{{ board.charset }}" />
        <title>{{ board.title }}</title>
        <meta name="description" content="{{ board.description }}" />
        {% for styleName, styleLink in board.stylesheets %}
            <link rel="stylesheet" type="text/css" title="{{ styleName }}" href="{{ board.templatePath }}/styles/{{ styleLink }}"{% if not loop.first %} disabled="true"{% endif %} />
        {% endfor %}
        <script type="text/javascript" charset="{{ board.charset }}" src="https://www.google.com/recaptcha/api.js"></script>
        <script type="text/javascript" charset="{{ board.charset }}" src="{{ board.templatePath }}/imageboard.js"></script>
        <script type="text/javascript">
            Satoko.cookiePrefix = '{{ board.cookiePrefix }}';
        </script>
    </head>
    <body>
        <div id="top"></div>
        {% include 'boardList.tpl' %}
        <div class="boardBanner">
            <img src="{{ board.bannerImage }}" alt="{{ board.title }}" />
            <div class="boardTitle">
                {{ board.title }}
            </div>
            <div class="boardSubtitle">
                {{ board.subtitle }}
            </div>
        </div>
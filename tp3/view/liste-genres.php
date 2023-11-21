{{ include('header.php') }}
<main>
{% for genre in genres %}
    <p>Nom : {{ genre.nom_genre }}</p> 
    {% if session.privilege == 1 %}
        <a href="{{path}}genre/destroy/{{ genre.id_genre }}">Supprimer</a>
    {% endif %}
    <br>
    <br>
{% endfor %}
{% if session.privilege == 1 %}
    <a href="{{path}}genre/create">Inserez nouveau genre</a>
{% endif %}
</main>
{{ include('footer.php') }} 

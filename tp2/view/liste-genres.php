{{ include('genres-header.php') }}
<main>
{% for genre in genres %}
    <p>Nom : {{ genre.nom }}</p> 
    <a href="{{path}}genre/destroy/{{ genre.id_genre }}">Supprimer</a>
    <br>
    <br>
{% endfor %}
<a href="{{path}}genre/create">Inserez nouveau genre</a>
</main>
{{ include('footer.php') }} 

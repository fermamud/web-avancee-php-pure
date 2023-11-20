{{ include('header.php') }}
<main>
    {% for artiste in artistes %}
    <p>Nom : {{ artiste.nom }}</p>
    <p>Prenom : {{ artiste.prenom }}</p>
    <p>Genre :
        {% for genre in genres %}
            {% if genre.id_genre == artiste.id_genre %}
                {{ genre.nom_genre }}
            {% endif %}    
        {% endfor %}
    </p>
    {% if guest == false %}
        {% if session.privilege == 1 %}
            <a href="{{path}}artiste/edit/{{ artiste.id_usager }}">Modifier les informations</a> | 
            <a href="{{path}}artiste/destroy/{{ artiste.id_usager }}">Supprimer collaborateur</a>
        {% endif %}
    {% endif %}
    <br>
    <br>
    {% endfor %}
</main>
{{ include('footer.php') }}
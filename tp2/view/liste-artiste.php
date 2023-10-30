{{ include('artiste-header.php') }}

<main>
    {% for artiste in artistes %}
        <p>Nom : {{ artiste.nom }}</p>
        <p>Prenom : {{ artiste.prenom }}</p>
        <p>Genre :
            {% for genre in genres %}
                {% if genre.id_genre == artiste.id_genre %}
                    {{ genre.nom }}
                {% endif %}    
            {% endfor %}
        </p>
        <a href="{{path}}artiste/edit/{{ artiste.id_usager }}">Modifier vos informations</a> | 
        <a href="{{path}}artiste/destroy/{{ artiste.id_usager }}">Supprimer collaborateur</a>
        <br>
        <br>
    {% endfor %}
    <a href="{{path}}artiste/create">Travaillez avec nous</a>
</main>
{{ include('footer.php') }}
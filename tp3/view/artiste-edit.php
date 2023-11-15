{{ include('header.php') }}
<main>
    <h1>Modification des Informations Personnels</h1>
    <form action="{{path}}artiste/update" method="post">
        <span class="error">{{ errors | raw }}</span>
        <input type="hidden" name="id_usager" value="{{ artiste.id_usager }}">
        <label>Nom :
            <input type="text" name="nom" value="{{ artiste.nom }}">
        </label>
        <label>Prenom :
            <input type="text" name="prenom"  value="{{ artiste.prenom }}">
        </label>
        <label>Genre :
            <select name="id_genre" >
                {% for genre in genres %}
                    {% if genre.id_genre == artiste.id_genre %}
                        <option selected value="{{ artiste.id_genre }}">{{ genre.nom_genre }}</option>
                    {% else %}
                        <option value="{{ genre.id_genre }}">{{ genre.nom_genre }}</option>
                    {% endif %}
                {% endfor %}
            </select>
        </label>
        <input type="submit" value="save">
    </form>
</main>
{{ include('footer.php') }}
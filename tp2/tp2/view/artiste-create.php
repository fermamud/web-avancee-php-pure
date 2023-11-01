{{ include('header.php') }}

<main>
    <h1>Inserez vos Informations Personnels</h1>
    <form action="{{path}}artiste/store" method="post">
        <label>Nom
            <input type="text" name="nom">
        </label>
        <label>Prenom
            <input type="text" name="prenom">
        </label>
        <label>Genre
            <select name="id_genre" >
                {% for genre in genres %}
                    <option value="{{ genre.id_genre }}">{{ genre.nom}}</option>
                {% endfor %}
            </select>
        </label>
        <input type="submit" value="save">
    </form>
</main>
{{ include('footer.php') }}
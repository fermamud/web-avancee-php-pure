{{ include('artiste-header.php') }}
<main>
    <h1>Inserez vos Informations Personnels</h1>
    <form action="{{path}}artiste/store" method="post">
        <span class="error">{{ errors | raw }}</span>
        <label>Nom
            <input type="text" name="nom">
        </label>
        <label>Prenom
            <input type="text" name="prenom">
        </label>
        <label>Genre
            <input type="text" name="nom_genre">
        </label>
        <input type="submit" value="save">
    </form>
</main>
{{ include('footer.php') }}
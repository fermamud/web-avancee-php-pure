{{ include('header.php') }}
<main>
    <h1>Inserez Nouveau Genre</h1>
    <form action="{{path}}genre/store" method="post">
    <span class="error">{{ errors | raw }}</span>
        <label>Nom
            <input type="text" name="nom_genre">
        </label>
        <input type="submit" value="save">
    </form>
</main>
{{ include('footer.php') }} 
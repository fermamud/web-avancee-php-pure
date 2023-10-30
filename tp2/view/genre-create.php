{{ include('genres-header.php') }}
<main>
    <h1>Inserez Nouveau Genre</h1>
    <form action="{{path}}genre/store" method="post">
        <label>Nom
            <input type="text" name="nom">
        </label>
        <input type="submit" value="save">
    </form>
</main>
{{ include('footer.php') }} 
{{ include('header.php') }}
<main>
    {% for log in logs %}
    <p>Id : {{ log.id }}</p>
    <p>Adresse Ip : {{ log.adresse_ip }}</p>
    <p>Date : {{ log.date }}</p>
    <p>Nom : {{ log.nom }}</p>
    <br>
    <br>
    {% endfor %}
</main>
{{ include('footer.php') }}
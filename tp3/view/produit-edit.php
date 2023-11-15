{{ include('header.php') }}
<main>
    <h1>Modifier les Informations sur le Produit</h1>
    <form action="{{path}}produit/update" method="post">
    <span class="error">{{ errors | raw }}</span>
        <input type="hidden" name="id_produit" value="{{ produit.id_produit}}">
        <label>Type :
            <input type="text" name="type" value="{{ produit.type }}">
        </label>
        <label>Description :
            <input type="text" class="description" name="description"  value="{{ produit.description }}">
        </label>
        <label>Prix :
            <input type="number" name="prix"  value="{{ produit.prix }}">
        </label>
        <label>Material :
            <select name="id_material" >
                {% for material in materials %}
                    {% if material.id_material == produit.id_material %}
                        <option selected value="{{ produit.id_material }}">{{ material.description }}</option>
                    {% else %}
                        <option value="{{ material.id_material }}">{{ material.description }}</option>
                    {% endif %}
                {% endfor %}
            </select>
        </label>
        <input type="submit" value="save">
    </form>
</main>
{{ include('footer.php') }}
{{ include('header.php') }}
<main>
    <span class="error">{{ errors | raw }}</span>
    </span>
    <h1>Fait main, avec amour</h1>
    <div>
    {% for produit in produits %}
        <section>
            <img src="{{path}}view/uploads/{{ produit.image }}" alt="image_accessoire">
            <div class="produit">
                <p>Type : {{ produit.type }}</p>
                <p>Description : {{ produit.description }}</p>
                <p>Material :
                    {% for material in materials %}
                        {% if material.id_material == produit.id_material %}
                            {{ material.description }}
                        {% endif %}    
                    {% endfor %}
                </p>
                <p>Prix : {{ produit.prix }} CAD</p>
                <p>Artiste :
                    {% for artiste in usagers %}
                        {% if artiste.id_usager == produit.id_usager %}
                            {{ artiste.prenom }} {{ artiste.nom }}
                        {% endif %}     
                    {% endfor %}
                </p>
                {% if guest == false %}
                    {% if session.privilege == 1 %}
                        <a href="{{path}}produit/edit/{{ produit.id_produit }}">Modifier les informations</a>  
                        | <a href="{{path}}produit/destroy/{{ produit.id_produit }}">Supprimer produit</a>
                    {% else %}
                        {% if session.id_usager == produit.id_usager %}
                            <a href="{{path}}produit/edit/{{ produit.id_produit }}">Modifier les informations</a>  
                            | <a href="{{path}}produit/destroy/{{ produit.id_produit }}">Supprimer produit</a>
                        {% endif %}
                    {% endif %}
                {% endif %}
            </div>
        </section>
    {% endfor %}
    </div>
    <br>
    {% if guest == false %}
        {% if session.privilege == 1 %}
            <a href="{{path}}produit/create">Insérer un nouveau produit</a>
        {% endif %}
    {% endif %}
</main>
{{ include('footer.php') }}
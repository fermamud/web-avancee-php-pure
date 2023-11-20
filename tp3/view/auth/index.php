{{ include('header.php') }}
<body>
    <div class="container">
        <form action="{{path}}login/auth" method="post">
            <h3>Login</h3>
            <span class="error">{{ errors | raw }}</span>
            <label>Utilisateur :
                <input type="text" name="username" value="{{usager.username}}">
            </label>
            <label>Mot de passe :
                <input type="password" name="password" value="">
            </label>
            <input type="submit" value="Connecter" class="btn">
        </form>
    </div>
</body>
</html>
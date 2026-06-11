<form action="?recipes=index" method="get" class="flex items-center gap-2">
    <input type="hidden" name="recipes" value="index">
    <input
        type="text"
        name="q"
        value="<?php echo ($_GET['q'] ?? ''); ?>"
        placeholder="Rechercher une recette"
        class="p-2 rounded-md text-gray-900"
    >
    <button type="submit" class="p-2 rounded-md bg-yellow-500 text-white hover:bg-yellow-600">
        Rechercher
    </button>
</form>
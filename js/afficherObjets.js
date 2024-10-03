

    console.log('Lié !');

    const table = document.getElementById('data-table');

    table.addEventListener('dblclick', function(e) {
        const cell = e.target;
        const originalText = cell.textContent;
        const input = document.createElement('input');
        input.type = 'text';
        input.value = originalText;
        cell.textContent = '';
        cell.appendChild(input);
        input.focus();

        input.addEventListener('blur', function() {
            const newText = input.value;
            cell.textContent = newText;

            
            if (newText !== originalText) {
                // Mettre à jour la base de données ici avec AJAX
                const row = cell.parentNode;
                const id = row.children[0].textContent; // suppose que le premier élément de la ligne est l'ID

                fetch('php/Backoffice/updateObjets.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id: id,
                        field: cell.getAttribute('data-field'),
                        value: newText
                    })
                });
                fetch('php/Backoffice/updateObjets.php', {
                    // ...
                }).then(response => response.text()).then(console.log)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        console.log(data.message);
                    } else {
                        console.error("Failed to update.");
                    }
                });
            }
        });
    });
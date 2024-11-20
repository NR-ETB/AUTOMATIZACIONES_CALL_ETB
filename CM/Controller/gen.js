function btn_search() {
    window.location.href = './searchMon.php';
}

function btn_new() {
    window.location.href = './newMon.php';
}

function btn_edit() {
    window.location.href = './editMon.php';
}

function btn_history() {
    window.location.href = './historyMon.php';
}

function btn_delete() {
    window.location.href = './deleteMon.php';
}

function btn_delete2() {
    window.location.href = '../deleteMon.php';
}

function rsearch() {
    window.location.href = './searchMon.php';
}

function redit() {
    window.location.href = './editMon.php';
}

function rnew() {
    window.location.href = './newMon.php';
}

function btn_search2() {
    window.location.href = '../searchMon.php';
}

function btn_new2() {
    window.location.href = '../newMon.php';
}

function btn_edit2() {
    window.location.href = '../editMon.php';
}

function btn_history2() {
    window.location.href = '../historyMon.php';
}

document.getElementById('downloadPdf').addEventListener('click', function() {
    const { jsPDF } = window.jspdf;

    const element = document.getElementById('con-sopo-inter'); // Elemento que contiene la tabla

    html2canvas(element).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jsPDF('l', 'mm', 'a3'); // Modo paisaje, tamaño A3
        const imgWidth = 297; // Ancho de la página A3
        const imgHeight = (canvas.height * imgWidth) / canvas.width; // Altura de la imagen, ajustada proporcionalmente

        let heightLeft = imgHeight; // Calculamos la cantidad de espacio que queda para más páginas
        let position = 0;

        // Agregar la primera página
        pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
        heightLeft -= 420; // La altura de la página A3 en modo paisaje (420 mm)

        // Si la tabla es demasiado grande, seguimos agregando páginas
        while (heightLeft > 0) {
            position = heightLeft - imgHeight; // Posicionamos la siguiente imagen en la página
            pdf.addPage();
            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= 420; // Restamos la altura de la página después de cada adición
        }

        // Guardar el PDF con el nombre "Base_Monitoreo.pdf"
        pdf.save('Base_Monitoreo.pdf');
    });
});

document.getElementById('exportButton').addEventListener('click', function() {
    const table = document.getElementById('dataTable');
    const rows = Array.from(table.rows);
    const csvContent = rows.map(row => 
        Array.from(row.cells)
        .map(cell => cell.innerText)
        .join(',')
    ).join('\n');

    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.setAttribute('download', 'data.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
});





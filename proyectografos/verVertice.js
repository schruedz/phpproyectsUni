const resaltar_aristas = () => {
        const vertice = document.getElementById('VerVertice').value;
        var edges = grafo.getConnectedEdges(vertice);
        grafo.selectEdges(edges, opciones);
        console.log(edges);
    }

    const Boton = document.getElementById('Mostrar_vertice');
    Boton.addEventListener('click', () => {
        const vertice = document.getElementById('VerVertice').value;
        if (vertice_anterior == null) {
            console.log("log")
        } else {
            nodos.update([{
                id: vertice_anterior,
                color: {
                    border: "#000000"
                }
            }]);
        }
        var node = nodos.get(vertice);
        if (node == null) {
            alert("No existe el nodo ingresado");
        } else {
            vertice_anterior = vertice;
            grafo.unselectAll();
            resaltar_aristas();
            nodos.update([{
                id: vertice,
                color: {
                    border: "#000000"
                }
            }]);
        }
    });
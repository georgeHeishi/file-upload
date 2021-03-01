document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#name-head").addEventListener('click', () => {
        sortTable(0);
    });
    document.querySelector("#size-head").addEventListener('click', () => {
        sortTable(1);
    });
    document.querySelector("#date-head").addEventListener('click', () => {
        sortTable(2);
    });


    //https://www.w3schools.com/howto/howto_js_sort_table.asp
    function sortTable(collum) {
        let table, rows, switching, i, x, y, shouldSwitch, direction, switchcount = 0;
        table = document.querySelector("#file-table");
        switching = true;
        direction = "asc";
        // console.log("help me god "+collum);
        while (switching) {
            //initialise switching by saying no switching to be done
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {

                shouldSwitch = false;
                // Get the two elements you want to compare,
                // one from current row and one from the next:
                x = rows[i].getElementsByTagName("TD")[collum];
                y = rows[i + 1].getElementsByTagName("TD")[collum];

                //compare appropriate collums
                //0-collum file name [String]
                //1-collum file size [Number]
                //2-collum file date [Date]
                if (direction === "asc") {
                    if ((collum === 0) && (x.children[0].innerHTML.toLowerCase() > y.children[0].innerHTML.toLowerCase())) {
                        shouldSwitch = true;
                        break;
                    } else if ((collum === 1) && (Number(x.children[0].innerHTML) > Number(y.children[0].innerHTML))) {
                        shouldSwitch = true;
                        break
                    } else if ((collum === 2) && (new Date(x.children[0].innerHTML) > new Date(y.children[0].innerHTML))) {
                        shouldSwitch = true;
                        break
                    }
                } else if (direction === "desc") {
                    if ((collum === 0) && (x.children[0].innerHTML.toLowerCase() < y.children[0].innerHTML.toLowerCase())) {
                        shouldSwitch = true;
                        break;
                    } else if ((collum === 1) && (Number(x.children[0].innerHTML) < Number(y.children[0].innerHTML))) {
                        shouldSwitch = true;
                        break
                    } else if ((collum === 2) && (new Date(x.children[0].innerHTML) < new Date(y.children[0].innerHTML))) {
                        shouldSwitch = true;
                        break
                    }
                }
            }

            // If a switch has been marked, make the switch and mark that a switch has been done
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;

            } else {
                if (switchcount === 0 && direction === "asc") {
                    direction = "desc";
                    switching = true;
                }
            }
        }
    }
});
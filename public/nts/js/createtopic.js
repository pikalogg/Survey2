    var count = 0;
    var element = document.getElementById("listquestion");

    function addQuestion() {
        count++;
        //header      
        var para = document.createElement("div");
        var node_div_row = document.createElement("div");
        var node_div_col_8 = document.createElement("div");
        var node_div_col_4 = document.createElement("div");
        var node_br = document.createElement("br");

        para.onclick = function() {
            var khoi = document.querySelectorAll(".one_zone");
            // click vào cái đã hiển thị rồi
            if (this.classList[1] === "zone_active") {

            } else {
                // bỏ hết shadow
                for (var j = 0; j < khoi.length; j++) {
                    khoi[j].classList.remove("zone_active");
                }
                // đối tượng được click thành shadow
                this.classList.toggle("zone_active");
            }
        }

        para.className = "one_zone";
        para.id = "ques" + count;
        node_div_row.className = "row";
        node_div_col_8.className = "col-md-8";
        node_div_col_4.className = "col-md-4";
        //col-8-text
        var node_input_01 = document.createElement("input");
        var node_textarea_01 = document.createElement("textarea");

        node_input_01.type = "text";
        node_input_01.name = "";
        node_input_01.value = "";
        node_input_01.placeholder = "Question";

        node_textarea_01.id = "description_input";
        node_textarea_01.rows = "1";
        node_textarea_01.type = "textarea";
        node_textarea_01.name = "";
        node_textarea_01.value = "";
        node_textarea_01.placeholder = "Text";

        //col-4      
        var node_label = document.createElement("label");
        var node_select = document.createElement("select");
        var node_option_text = document.createElement("option");
        var node_option_multichoice = document.createElement("option");
        var node_option_TF = document.createElement("option");

        var node_div_col_4_add_delete = document.createElement("div");
        var node_a_01 = document.createElement("a");
        var node_i_01 = document.createElement("i");
        var node_a_02 = document.createElement("a");
        var node_i_02 = document.createElement("i");

        node_label.innerHTML = "Type of Question";

        node_select.name = "";

        node_option_text.value = "0";
        node_option_text.innerHTML = "Text";

        node_option_multichoice.value = "1";
        node_option_multichoice.innerHTML = "Multichoice";

        node_option_TF.value = "2";
        node_option_TF.innerHTML = "True/false";

        node_div_col_4_add_delete.id = "lew lew";
        node_div_col_4_add_delete.className = "btn-add-delete";

        node_a_01.onclick = function() {
            addQuestion();
        }
        node_i_01.className = "fas fa-plus-square";

        node_a_02.onclick = function() {
            var ques = document.getElementById(para.id);
            element.removeChild(ques);
        }
        node_i_02.className = "fas fa-trash-alt";
        //////////////
        node_div_row.appendChild(node_div_col_8);
        node_div_row.appendChild(node_div_col_4);

        //text
        node_div_col_8.appendChild(node_input_01);
        node_div_col_8.appendChild(node_br);
        node_div_col_8.appendChild(node_textarea_01);

        node_div_col_4.appendChild(node_label);
        node_div_col_4.appendChild(node_br);
        node_div_col_4.appendChild(node_select);
        node_div_col_4.appendChild(node_div_col_4_add_delete);

        node_select.appendChild(node_option_text);
        node_select.appendChild(node_option_multichoice);
        node_select.appendChild(node_option_TF);

        node_div_col_4_add_delete.appendChild(node_a_01)
        node_div_col_4_add_delete.appendChild(node_a_02)

        node_a_01.appendChild(node_i_01);
        node_a_02.appendChild(node_i_02);

        para.appendChild(node_div_row)

        element.appendChild(para);
    }
    addQuestion();
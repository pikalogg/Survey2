    // var count = 0;
    var element = document.getElementById("listquestion");

    function addQuestion() {
        count++;
        document.querySelector('#amountques').value = "" + count;
        var countC = 1;
        var countR = 1;
        var amountanc = document.createElement("input");
        var amountanr = document.createElement("input");
        amountanc.hidden = "true";
        amountanr.hidden = "true";
        amountanc.value = "1";
        amountanc.value = "1";
        amountanc.name = "amountanc" + count;
        amountanr.name = "amountanr" + count;




        //header      
        var para = document.createElement("div");
        var node_div_row = document.createElement("div");
        var node_div_col_8 = document.createElement("div");
        var node_div_col_4 = document.createElement("div");
        var node_br = document.createElement("br");
        var foo = document.createElement("div");

        // cau hoi


        //col-8-text
        var node_textarea_01 = document.createElement("textarea");

        node_textarea_01.id = "questitle" + count;
        // node_textarea_01.rows = "1";
        node_textarea_01.name = "ques" + count;
        // node_textarea_01.value = "";
        node_textarea_01.placeholder = "Câu hỏi không có tiêu đề";

        var node_div_ques_t = document.createElement("div");
        var node_div_ques_c = document.createElement("div");
        var node_div_ques_r = document.createElement("div");

        var node_input_t = document.createElement("input");
        node_input_t.type = "text";
        node_input_t.value = "";
        node_input_t.placeholder = "   Câu trả lời";
        node_input_t.disabled = "true";

        var span_c = document.createElement("span");
        var node_input_c = document.createElement("input");
        node_input_c.type = "text";
        node_input_c.name = "";
        node_input_c.value = "";
        node_input_c.placeholder = "  Tùy chọn";
        span_c.className = "spanc";

        var span_r = document.createElement("span");
        var node_input_r = document.createElement("input");
        node_input_r.type = "text";
        node_input_r.name = "";
        node_input_r.value = "";
        node_input_r.placeholder = "  Tùy chọn";
        span_r.className = "spanr spanc";

        node_div_ques_t.appendChild(node_input_t.cloneNode());

        var node_div_ques = document.createElement("div");
        node_div_ques.className = "ques";
        // nut xoa
        var remove_ques = document.createElement("img");
        remove_ques.className = "remove-ques";
        remove_ques.src = "../img/delete.png";
        remove_ques.alt = "x";
        remove_ques.onclick = function() {
            var temp = this.parentNode;
            temp.parentNode.removeChild(temp);
        }

        // end xoa
        var tp_node_1 = node_div_ques.cloneNode();
        tp_node_1.appendChild(span_c.cloneNode());
        var _ip_c1 = node_input_c.cloneNode();
        _ip_c1.name = node_textarea_01.name + "answerc" + countC;
        _ip_c1.id = node_textarea_01.name + "answerc" + countC;
        countC++;
        tp_node_1.appendChild(_ip_c1);
        node_div_ques_c.appendChild(tp_node_1);

        var tp_node_2 = node_div_ques.cloneNode();
        tp_node_2.appendChild(span_r.cloneNode());
        var _ip_r1 = node_input_r.cloneNode();
        _ip_r1.name = node_textarea_01.name + "answerr" + countR;
        _ip_r1.id = node_textarea_01.name + "answerr" + countR;

        countR++;
        tp_node_2.appendChild(_ip_r1);
        node_div_ques_r.appendChild(tp_node_2);

        foo.style.marginTop = "30px";
        foo.style.marginBottom = "30px";
        foo.style.minHeight = "40px";
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
        node_div_col_4.className = "col-md-4 center";

        // var ppppppppppppppp = node_textarea_01.cloneNode();
        // ppppppppppppppp.name = ""



        //col-4      
        var node_label = document.createElement("label");
        var node_select = document.createElement("select");
        var node_option_text = document.createElement("option");
        var node_option_multichoice = document.createElement("option");
        var node_option_TF = document.createElement("option");

        var node_div_col_4_add_delete = document.createElement("div");
        var node_span_add = document.createElement("span");
        var node_a_02 = document.createElement("a");
        var node_i_02 = document.createElement("i");

        node_label.innerHTML = "Kiểu câu hỏi  *<";
        node_select.name = "type" + count;
        node_select.id = "select" + count;
        node_select.onclick = function() {
            switch (node_select.value) {
                case "0": // Trả lời ngắn
                    node_span_add.innerHTML = "";
                    try {
                        node_div_col_8.removeChild(node_div_ques_c);
                    } catch (e) {}
                    try {
                        node_div_col_8.removeChild(node_div_ques_r);
                    } catch (e) {}
                    try {
                        node_div_col_8.appendChild(node_div_ques_t);
                    } catch (e) {}

                    break;
                case "1": // Trắc nghiệm
                    node_span_add.innerHTML = "Thêm tùy chọn";
                    try {
                        node_div_col_8.removeChild(node_div_ques_c);
                    } catch (e) {}
                    try {
                        node_div_col_8.removeChild(node_div_ques_t);
                    } catch (e) {}
                    try {
                        node_div_col_8.appendChild(node_div_ques_r);
                    } catch (e) {}
                    break;
                case "2": // Trả lời ngắn
                    node_span_add.innerHTML = "Thêm tùy chọn";
                    try {
                        node_div_col_8.removeChild(node_div_ques_t);
                    } catch (e) {}
                    try {
                        node_div_col_8.removeChild(node_div_ques_r);
                    } catch (e) {}
                    try {
                        node_div_col_8.appendChild(node_div_ques_c);
                    } catch (e) {}
                    break;
                default:
                    node_span_add.innerHTML = "";
                    break;

            }
        }
        node_select.onchange = function() {
            switch (node_select.value) {
                case "0": // Trả lời ngắn
                    node_span_add.innerHTML = "";
                    try {
                        node_div_col_8.removeChild(node_div_ques_c);
                    } catch (e) {}
                    try {
                        node_div_col_8.removeChild(node_div_ques_r);
                    } catch (e) {}
                    try {
                        node_div_col_8.appendChild(node_div_ques_t);
                    } catch (e) {}

                    break;
                case "1": // Trắc nghiệm
                    node_span_add.innerHTML = "Thêm tùy chọn";
                    try {
                        node_div_col_8.removeChild(node_div_ques_c);
                    } catch (e) {}
                    try {
                        node_div_col_8.removeChild(node_div_ques_t);
                    } catch (e) {}
                    try {
                        node_div_col_8.appendChild(node_div_ques_r);
                    } catch (e) {}
                    break;
                case "2": // Trả lời ngắn
                    node_span_add.innerHTML = "Thêm tùy chọn";
                    try {
                        node_div_col_8.removeChild(node_div_ques_t);
                    } catch (e) {}
                    try {
                        node_div_col_8.removeChild(node_div_ques_r);
                    } catch (e) {}
                    try {
                        node_div_col_8.appendChild(node_div_ques_c);
                    } catch (e) {}
                    break;
                default:
                    node_span_add.innerHTML = "";
                    break;

            }
        }

        node_option_text.value = "0";
        node_option_text.innerHTML = "Trả lời ngắn";

        node_option_multichoice.value = "1";
        node_option_multichoice.innerHTML = "Trắc nghiệm";

        node_option_TF.value = "2";
        node_option_TF.innerHTML = "Hộp kiểm";

        node_div_col_4_add_delete.id = "lew lew";
        node_div_col_4_add_delete.className = "btn-add-delete";

        // node_span_add.value = "Thêm tùy chọn";
        node_span_add.innerHTML = "";

        node_span_add.onclick = function() {
            switch (node_select.value) {
                case "0": // Trả lời ngắn
                    break;
                case "1": // Trắc nghiệm
                    var temp_r = node_input_r.cloneNode();
                    temp_r.name = node_textarea_01.name + "answerr" + countR;
                    temp_r.id = node_textarea_01.name + "answerr" + countR;
                    countR++;
                    amountanr.value = "" + countR;
                    var temp_div_ques = node_div_ques.cloneNode();
                    temp_div_ques.appendChild(span_r.cloneNode());
                    temp_div_ques.appendChild(temp_r);

                    var temp_re = remove_ques.cloneNode();
                    temp_re.innerHTML = "x";
                    temp_re.onclick = function() {
                        var temp = this.parentNode;
                        temp.parentNode.removeChild(temp);
                    }
                    temp_div_ques.appendChild(temp_re);
                    node_div_ques_r.appendChild(temp_div_ques);
                    break;
                case "2": // hộp kiểm
                    var temp_c = node_input_c.cloneNode();
                    temp_c.name = node_textarea_01.name + "answerc" + countC;
                    temp_c.id = node_textarea_01.name + "answerc" + countC;
                    countC++;
                    amountanc.value = "" + countC;
                    var temp_div_ques = node_div_ques.cloneNode();
                    temp_div_ques.appendChild(span_c.cloneNode());
                    temp_div_ques.appendChild(temp_c);
                    var temp_re = remove_ques.cloneNode();
                    temp_re.innerHTML = "x";
                    temp_re.onclick = function() {
                        var temp = this.parentNode;
                        temp.parentNode.removeChild(temp);
                    }
                    temp_div_ques.appendChild(temp_re);
                    node_div_ques_c.appendChild(temp_div_ques);
                    break;
                default:
                    node_span_add.innerHTML = "";
                    break;

            }
        }
        node_span_add.id = "add-choice" + count;

        node_a_02.className = "trash";
        node_a_02.onclick = function() {
            var ques = document.getElementById(para.id);
            element.removeChild(ques);
        }
        node_i_02.className = "fas fa-trash-alt";
        //////////////
        node_div_row.appendChild(node_div_col_8);
        node_div_row.appendChild(node_div_col_4);

        //text
        node_div_col_8.appendChild(node_textarea_01);
        // node_div_col_8.appendChild(node_br);
        node_div_col_8.appendChild(node_div_ques_t);


        node_div_col_4.appendChild(node_label);
        node_div_col_4.appendChild(node_br);
        node_div_col_4.appendChild(node_select);
        node_div_col_4.appendChild(node_div_col_4_add_delete);

        node_select.appendChild(node_option_text);
        node_select.appendChild(node_option_multichoice);
        node_select.appendChild(node_option_TF);

        foo.appendChild(node_span_add);
        foo.appendChild(node_a_02);

        node_a_02.appendChild(node_i_02);
        para.appendChild(node_div_row);
        para.appendChild(foo);
        para.appendChild(amountanc);
        para.appendChild(amountanr);

        element.appendChild(para);
    }
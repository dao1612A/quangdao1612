var RunFilter = {
    init(){
        this.runQuality();
        this.runSex();
        this.runAge();
        this.runExp();
        this.runRank();
        this.runWorkType();
        this.runSalary();
        this.runSchool();
        this.runCompany();

        this.undo();
    },
    runQuality() {
        let self = this;
        self.runAttribute('.filter-body', '.js-filter-quality', 'qlt', 'qlt');
        //self.runAttribute('body', '.fade-in-bottom .js-filter-mb-quality', 'mb_qlt', 's');
    },
    runSex() {
        let self = this;
        self.runAttribute('.filter-body', '.js-filter-sex', 'sex', 'sex');
        //self.runAttribute('body', '.fade-in-bottom .js-filter-mb-sex', 'mb_sex', 'sex');
    },
    runAge() {
        let self = this;
        self.runAttribute('.filter-body', '.js-filter-age', 'age[]', 'age');
        //self.runAttribute('body', '.fade-in-bottom .js-filter-mb-age', 'mb_age[]', 'age');
    },
    runExp() {
        let self = this;
        self.runAttribute('.filter-body', '.js-filter-exp', 'exp[]', 'exp');
        self.runAttribute('body', '.fade-in-bottom .js-filter-mb-exp', 'mb_exp[]', 'exp');
    },
    runRank() {
        let self = this;
        self.runAttribute('.filter-body', '.js-filter-rank', 'rank[]', 'rank');
        self.runAttribute('body', '.fade-in-bottom .js-filter-mb-rank', 'mb_rank[]', 'rank');
    },
    runWorkType() {
        let self = this;
        self.runAttribute('.filter-body', '.js-filter-work-type', 'work_type[]', 'type');
        self.runAttribute('body', '.fade-in-bottom .js-filter-mb-work-type', 'mb_work_type[]', 'type');
    },
    runSalary() {
        let self = this;
        self.runAttribute('.filter-body', '.js-filter-salary', 'salary[]', 'slr');
        self.runAttribute('body', '.fade-in-bottom .js-filter-mb-salary', 'mb_salary[]', 'slr');
    },
    runSchool() {
        let self = this;
        self.runAttribute('.filter-body', '.js-filter-school', 'school[]', 'sch');
        self.runAttribute('body', '.fade-in-bottom .js-filter-mb-school', 'mb_school[]', 'sch');
    },
    runCompany() {
        let self = this;
        self.runAttribute('.filter-body', '.js-filter-company', 'company[]', 'c');
        self.runAttribute('body', '.fade-in-bottom .js-filter-mb-company', 'mb_company[]', 'c');
    },

    undo() {
        let self = this;
        $('.search-filter').on('click', '.js-undo-search', function (e) {
            e.preventDefault();
            let old_url = location.href;
            let key = $(this).attr('data-attr');
            let val = $(this).attr('data-val');
            let url = replaceUrlParam(old_url, key, val);

            self.runLocation(url);
        });

        function replaceUrlParam(url, key, value) {
            let re = new RegExp("([?&])" + key + "=[^&#]*", "i");
            if (re.test(url)) {
                let string = GetURLParameter(key);
                if (string.indexOf(',') > 0) {
                    let arr = string.split(",");
                    if (arr.indexOf(value) !== -1) {
                        arr.splice(arr.indexOf(value), 1);
                    }
                    url = url.replace(re, '$1' + key + "=" + arr.toString());
                } else {
                    url = url.replace(re, '$1' + key + "=" + '');
                }
            }
            return url;
        };

        function GetURLParameter(sParam) {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++) {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam) {
                    return sParameterName[1];
                }
            }
        }
    },
    runAttribute(dom1, dom2, element, param) {
        let self = this;
        $(dom1).on('click', dom2, function () {
            let $arr_element = $('body').find(`input[name="${element}"]`);
            var arr_checked = [];
            for (let i = 0; i < $arr_element.length; i++) {
                if ($arr_element[i].checked === true && !arr_checked.includes($arr_element[i].value)) {
                    arr_checked.push($arr_element[i].value);
                }
            }
            let old_url = location.href;
            let url = self.addAndUpdateParamToQueryUrl(old_url, param, arr_checked);

            self.runLocation(url);
        });
    },
    addAndUpdateParamToQueryUrl(url, key, value) {
        //tạo một biểu thức chính quy tìm kiếm với tham số param_key
        let re = new RegExp("([?&])" + key + "=[^&#]*", "i");
        //kiểm tra nếu tồn tại thì thay thế chuỗi mới với tham số và giá trị được truyền vào
        if (re.test(url)) {
            url = url.replace(re, '$1' + key + "=" + value);
        } else {
            //kiem tra dấu ? đã có trong chuỗi query ? . True -> "&" : False -> "?";
            let separator = /\?/.test(url) ? "&" : "?";
            url = url + separator + key + "=" + value;
        }
        return url;
    },
    runLocation(url) {
        window.location = url;
    }
};

export default RunFilter;
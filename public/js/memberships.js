var vue = new Vue({
    el : "#app",

    mounted : function() {

        if ( typeof id !== 'undefined' ) {
            this.id = id;
            var e = this;

            this.$http.get('/api/membership/'
            + this.id + '/education' ).then(function(response){
                e.educations = response.body;
            });

            this.$http.get('/api/membership/'
            + this.id + '/companies' ).then(function(response){
                e.companies = response.body;
            });
        }


    },

    data : {
        id : null,
        name : "name",
        education : {},
        educations : [],
        form_company : {},
        companies : [],
        type_of_education : [
            { id : 'T', desc : 'Tertiary' },
            { id : 'M', desc : 'Masters' },
            { id : 'D', desc : 'Doctoral' }
        ]
    },

    methods : {
        addEducation : function() {
            //console.log(JSON.stringify(this.item));
            this.educations.push(Vue.util.extend({},this.education));
            this.education = {};
        },

        removeEducation : function(education) {
            var e = this;
            this.$http.delete('/api/education/' + education.id+ "/delete" ).then(function(response){
                e.educations.splice(education,1);
            });

        },

        addCompany : function() {
            //console.log(JSON.stringify(this.item));
            this.companies.push(Vue.util.extend({},this.form_company));
            this.form_company = {};
        },

        removeCompany : function(company) {
            var e = this;
            this.$http.delete('/api/companies/' + company.id+ "/delete" ).then(function(response){
                e.companies.splice(company,1);
            });

        }
    }
});

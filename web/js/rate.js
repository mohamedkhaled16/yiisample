angular.module('RateApp', [])
        .controller('rateCtrl', ['$http', function ($http) {
                var scope = this;
                this.premium = 0;
                this.deductible = 0;
                this.rate = {
                    'buy_back_limit': 0,
                    'deductible': 0,
                    'base_rate': 0,
                    'credit_modification': 0,
                    'debit_modification': 0,
                    'premium': 0,
                    'addtion_var': 0,
                };
                this.changgeneral = function () {
                    scope.rate.deductible = (scope.rate.buy_back_limit > 8000) ? (0.07 * scope.rate.buy_back_limit) : (0.05 * scope.rate.buy_back_limit);
                    scope.rate.premium = ((scope.rate.buy_back_limit - scope.rate.deductible) * (scope.rate.base_rate * (scope.rate.addtion_var + (scope.rate.debit_modification - scope.rate.credit_modification))));
                }
            }]);

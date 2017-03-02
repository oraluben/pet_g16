/**
 * Created by Dilemma丶 on 2017/2/28.
 */
var storage, petApp;

petApp = angular.module('petApp', []);

storage = window.localStorage;

petApp.controller('LoginCtrl', function ($scope, $q, $http, $window, $location) {
    var api, error_tip, request, search, stripNull, pet_api_core, pet_config, token;
    request = function (params) {
        var ps, r, requestType, url, _ref;
        ps = ((_ref = params.action) != null ? _ref : '').split(/\s+/g);
        requestType = ps[0].toLowerCase();
        url = ps[1];
        delete params.action;
        r = api[requestType](url, params, true);
        return r;
    };
    pet_config = {
        api_host: ""
    };
    error_tip = function (data, noAlertTip, error_callback) {
        var stopPopupWindow;
        if (data.error_code === 1) {
            return $window.location.href = "index.html";
        } else if (!noAlertTip) {
            stopPopupWindow = typeof error_callback === "function" ? error_callback(data) : void 0;
            if (!stopPopupWindow) {
                return alert.add('danger', data.error_str);
            }
        } else {
            return typeof error_callback === "function" ? error_callback() : void 0;
        }
    };
    stripNull = function (obj) {
        var key, val;
        for (key in obj) {
            val = obj[key];
            if (obj[key] === null) {
                delete obj[key];
            }
        }
        return obj;
    };
    pet_api_core = {
        get_json: function (url, params, success_callback, error_callback) {
            var __no_alert_tip__, _url;
            _url = url;
            if (!url.startsWith('/')) {
                _url = pet_config.api_host + url;
            }
            __no_alert_tip__ = !!params.__no_alert_tip__;
            if (params != null) {
                delete params.__no_alert_tip__;
            }
            return $http.get(_url, {
                'params': params,
                'cache': false
            }).success(function (data, status) {
                if (data.error_code !== 0) {
                    return error_tip(data, __no_alert_tip__, error_callback);
                } else {
                    return typeof success_callback === "function" ? success_callback(data, status) : void 0;
                }
            }).error(function (xhr, status) {
                if (+xhr.status === 503) {
                    $window.location.href = '/503.html';
                } else if (+xhr.status === 404) {
                    $window.location.href = '/404.html';
                }
                return typeof error_callback === "function" ? error_callback(xhr) : void 0;
            });
        },
        post_json: function (url, data, success_callback, error_callback) {
            var __no_alert_tip__;
            if (!pet_config.debug) {
                __no_alert_tip__ = !!data.__no_alert_tip__;
                if (data != null) {
                    delete data.__no_alert_tip__;
                }
                return $http({
                    url: pet_config.api_host + url,
                    method: 'POST',
                    data: $.param(stripNull(data)),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).success(function (data, status) {
                    if (data.error_code !== 0) {
                        return error_tip(data, __no_alert_tip__, error_callback);
                    } else {
                        return typeof success_callback === "function" ? success_callback(data, status) : void 0;
                    }
                }).error(function (xhr) {
                    return typeof error_callback === "function" ? error_callback(xhr) : void 0;
                });
            } else {
                return this.get_json(url, data, success_callback, error_callback);
            }
        },
        post_form: function (url, data, success_callback, error_callback) {
            var form, key, v;
            if (!pet_config.debug) {
                form = new FormData();
                for (key in data) {
                    v = data[key];
                    form.append(key, v);
                }
                $http.post(pet_config.api_host + url, form, {
                    transformRequest: angular.identity,
                    headers: {
                        'Content-Type': void 0
                    }
                }).success(function (data, status) {
                    return typeof success_callback === "function" ? success_callback(data, status) : void 0;
                }).error(function (xhr, status, headers, config) {
                    if (+xhr.status === 503) {
                        $window.location.href = '/503.html';
                    } else if (+xhr.status === 404) {
                        $window.location.href = '/404.html';
                    }
                    return typeof error_callback === "function" ? error_callback(xhr) : void 0;
                });
            } else {
                this.get_json(url, data, success_callback, error_callback);
            }
        },
        ajax_post_json: function (url, prams, success_callback, error_callback, async) {
            var tp;
            $.support.cors = true;
            async = typeof async === void 0 || async === null ? true : !!async;
            tp = pet_config.debug ? 'GET' : 'POST';
            return $.ajax(pet_config.api_host + url, {
                "data": prams,
                "type": tp,
                "dataType": "json",
                "crossDomain": true,
                "cache": false,
                "async": async,
                "success": function (data, status) {
                    return typeof success_callback === "function" ? success_callback(data) : void 0;
                },
                "error": function (xhr, status) {
                    if (+xhr.status === 503) {
                        $window.location.href = '/503.html';
                    } else if (+xhr.status === 404) {
                        $window.location.href = '/404.html';
                    }
                    return typeof error_callback === "function" ? error_callback(xhr, status) : void 0;
                }
            });
        }
    };
    api = {
        uri: "",
        get: function (url, params, noToken) {
            var defer;
            defer = $q.defer();
            params = params != null ? params : {};
            pet_api_core.get_json(url, params, function (d) {
                defer.resolve(d);
            }, function (d) {
                defer.reject(d);
                if (noToken) {
                    return true;
                }
            }, noToken);
            return defer.promise;
        },
        post: function (url, params, noToken) {
            var defer;
            defer = $q.defer();
            params = params != null ? params : {};
            pet_api_core.post_json(url, params, function (d) {
                defer.resolve(d);
            }, function (d) {
                defer.reject(d);
                if (noToken) {
                    return true;
                }
            }, noToken);
            return defer.promise;
        },
        post_form: function (url, data) {
            var defer;
            defer = $q.defer();
            pet_api_core.post_form(url, data, function (d) {
                defer.resolve(d);
            }, function (d) {
                defer.reject(d);
            });
            return defer.promise;
        }
    };

    $scope.login = function (username, pwd) {
        var p1;
        if (username === void 0 || username.length === 0) {
            return sweetAlert({
                title: "用户名不能为空",
                showConfirmButton: false,
                timer: 1500,
                type: 'error'
            });
        } else if (pwd === void 0 || pwd.length === 0) {
            return sweetAlert({
                title: "密码不能为空",
                showConfirmButton: false,
                timer: 1500,
                type: 'error'
            });
        } else {
            p1 = {
                action: "post_form stracking/login",
                login_name: username,
                password: hex_md5(pwd)
            };
            request(p1).then(function (d) {
                console.log(p1);
                console.log(d);
                if (d.error_code === 0) {
                    console.log(d.error_code);
                    localStorage.setItem(storage, d.data.token.token);
                    return $window.location.href = "main.html";
                } else {
                    console.log(d.error_code);
                    return sweetAlert({
                        title: "用户名或密码错误",
                        showConfirmButton: false,
                        timer: 1500,
                        type: 'error'
                    });
                }
            });
            return false;
        }
    };
    // search = $location.search();
    // token = search['access_token'];
    // if (token != null) {
    //     localStorage.setItem(storage, token);
    //     return $window.location.href = "main.html";
    // }
});
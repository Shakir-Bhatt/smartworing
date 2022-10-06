'use strict';

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

$(document).ready(function () {

    $('#user_table').DataTable();
    $('#sales_table').DataTable();

    // Chart in Dashboard version 2
    var echartElem4 = document.getElementById('echart4');
    if (echartElem4) {
        var echart4 = echarts.init(echartElem4);
        echart4.setOption(_extends({}, echartOptions.lineNoAxis, {
            series: [{
                data: [50, 60, 10, 40, 30, 20, 30],
                lineStyle: {
                    color: 'rgba(102, 51, 153, .86)',
                    width: 3,
                    shadowColor: 'rgba(0, 0, 0, .2)',
                    shadowOffsetX: -1,
                    shadowOffsetY: 8,
                    shadowBlur: 10
                },
                label: { show: true, color: '#212121' },
                type: 'line',
                smooth: true,
                itemStyle: {
                    borderColor: 'rgba(69, 86, 172, 0.86)'
                }
            }]
        }, {
            xAxis: { data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] }
        }));
        $(window).on('resize', function () {
            setTimeout(function () {
                echart4.resize();
            }, 500);
        });
    }
    // Chart in Dashboard version 2
    var echartElem5 = document.getElementById('echart5');
    if (echartElem5) {
        var echart5 = echarts.init(echartElem5);
        echart5.setOption(_extends({}, echartOptions.defaultOptions, {
            legend: {
                show: true,
                bottom: 0
            },
            series: [_extends({
                type: 'pie'
            }, echartOptions.pieRing, {

                label: echartOptions.pieLabelCenterHover,
                data: [{
                    name: 'Completed',
                    value: 80,
                    itemStyle: {
                        color: '#663399'
                    }
                }, {
                    name: 'Pending',
                    value: 20,
                    itemStyle: {
                        color: '#ced4da'
                    }
                }]
            })]
        }));
        $(window).on('resize', function () {
            setTimeout(function () {
                echart5.resize();
            }, 500);
        });
    }

     // Chart in Dashboard version 1
     var echartElem1 = document.getElementById('echart1');
     if (echartElem1) {
         var echart1 = echarts.init(echartElem1);
         echart1.setOption(_extends({}, echartOptions.lineFullWidth, {
             series: [_extends({
                 data: [30, 40, 20, 50, 40, 80, 90]
             }, echartOptions.smoothLine, {
                 markArea: {
                     label: {
                         show: true
                     }
                 },
                 areaStyle: {
                     color: 'rgba(102, 51, 153, .2)',
                     origin: 'start'
                 },
                 lineStyle: {
                     color: '#663399'
                 },
                 itemStyle: {
                     color: '#663399'
                 }
             })]
         }));
         $(window).on('resize', function () {
             setTimeout(function () {
                 echart1.resize();
             }, 500);
         });
     }
     // Chart in Dashboard version 1
     var echartElem2 = document.getElementById('echart2');
     if (echartElem2) {
         var echart2 = echarts.init(echartElem2);
         echart2.setOption(_extends({}, echartOptions.lineFullWidth, {
             series: [_extends({
                 data: [30, 10, 40, 10, 40, 20, 90]
             }, echartOptions.smoothLine, {
                 markArea: {
                     label: {
                         show: true
                     }
                 },
                 areaStyle: {
                     color: 'rgba(255, 193, 7, 0.2)',
                     origin: 'start'
                 },
                 lineStyle: {
                     color: '#FFC107'
                 },
                 itemStyle: {
                     color: '#FFC107'
                 }
             })]
         }));
         $(window).on('resize', function () {
             setTimeout(function () {
                 echart2.resize();
             }, 500);
         });
     }

     var echartElem3 = document.getElementById('echart3');
     if (echartElem3) {
         var echart3 = echarts.init(echartElem3);
         echart3.setOption(_extends({}, echartOptions.lineNoAxis, {
             series: [{
                 data: [40, 80, 20, 90, 30, 80, 40, 90, 20, 80, 30, 45],
                 lineStyle: _extends({
                     color: 'rgba(102, 51, 153, 0.8)',
                     width: 3
                 }, echartOptions.lineShadow),
                 label: { show: true, color: '#212121' },
                 type: 'line',
                 smooth: true,
                 itemStyle: {
                     borderColor: 'rgba(102, 51, 153, 1)'
                 }
             }]
         }, {
            xAxis: { data: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] }
         }));
         $(window).on('resize', function () {
             setTimeout(function () {
                 echart3.resize();
             }, 500);
         });
     }
});

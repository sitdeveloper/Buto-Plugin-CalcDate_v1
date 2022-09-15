# Buto-Plugin-CalcDate_v1
Calculat date.

## Usage
```
wfPlugin::includeonce('calc/date_v1');
$calc = new PluginCalcDate_v1();
print_r($calc->calcAll('2019-02-27', '2029-01-05'));
```

## Methods
```
calcYears();
calcMonths();
calcSeconds();
calcAll();
```

## Method calcAll
Return object of PluginWfArray.
```
start_date: '2019-02-27'
end_date: '2029-01-05'
now_date: '2022-09-15'
negative: false
years: '9'
months: '10'
days: '9'
hours: '0'
minutes: '0'
seconds: '0'
weeks: 514
days_total: 3600
months_total: 118
calendar_months:
  years: 10
  from: 2
  to: 1
  diff: 119
months_and_days: '118,09'
```

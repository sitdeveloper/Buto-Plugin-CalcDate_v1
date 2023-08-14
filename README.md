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
Return array.
```
start_date: '2023-04-06'
end_date: '2023-08-11'
now_date: '2023-08-11'
negative: false
years: 0
months: 4
days: 5
hours: 0
minutes: 0
seconds: 0
weeks: 18
days_total: 127
months_total: 4
calendar_months:
  years: 0
  from: 4
  to: 8
  diff: 4
months_and_days: '4,05'
months30: 4
months30_and_days: '4,07'
```

### months30
One month counts as 30 days.

### months30_and_days
One month counts as 30 days.

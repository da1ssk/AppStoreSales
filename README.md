# App Store Sales
A simple PHP script that extracts the sales data from the reports.

# Prerequisite
Download your financial reports from AppStore Connect, and unzip it somewhere.

Make sure you choose "All teritories (multiple files)" when you download it.

# Usage
```
% php appstore_sales.php {path to the report txt file}
```

# Sample output
```
80085260_1218_AE.txt	12/02/2018 - 12/29/2018
	ProductId1: 4 x 9.99 = 39.96 AED (AE)
Total (AED):	39.96
	
80085260_1218_AU.txt	12/02/2018 - 12/29/2018
	ProductId0: 1 x 2.86 = 2.86 AUD (AU)
	ProductId1: 41 x 3.81 = 156.21 AUD (AU)
Total (AUD):	159.07
	
80085260_1218_BR.txt	12/02/2018 - 12/29/2018
	ProductId1: -1 x 10.43 = -10.43 BRL (BR)
	ProductId01: 10 x 10.43 = 104.3 BRL (BR)
Total (BRL):	93.87
```

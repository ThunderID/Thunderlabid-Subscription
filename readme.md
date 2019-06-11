# THUNDER SUBSCRIPTION

## MAIN ACTIVITY

### UPDATE PLAN
1. Create new plan :check
2. Update plan name / period 
	validate : unpublished plan
3. Update plan feature (unpublished plan)
	validate : unpublished plan
4. Update plan pricing
	notify : current subscribers [CROSS DOMAIN]
5. Delete plan feature (unpublished plan)
	validate : unpublished plan
6. Delete plan pricing (started price)
	validate : not yet started price
7. Delete plan (published plan)
	notify : current subscribers

### SUBSCRIBE
1. Subscribe
	authenticate: customer can only subscribe free trial once [APPS]
	validate : must not have unpaid subscription (check in billing) [CROSS DOMAIN]
	modify : ended at = created at + monthly period (months no overflow)
2. Extend subscription (only is auto extends) 
	authenticate : only me / admin [APPS]
3. unsubscribe (before ended at)
	authenticate: admin [APPS]

### AUTOMATION
1. every day (midnight/start of the day)
	console : check if previous bills, throw event extend subscription
2. listen extend subscription
	do : create new subscription same config

/**
 * CvrApi.js
 * @author Kevin From <kevinfrom@live.dk>
 * @website https://kevinfrom.dk
 *
 * Estimated browser support:
 * https://caniuse.com/#search=javascript%20class
 */

class CvrApi {
	baseUrl = 'cvrapi.dk/api';

	constructor(country = 'dk', ssl = true) {
		this.country = country;
		this.ssl     = ssl;
	}

	getUrl(query, type = 'search') {
		return encodeURI((this.ssl ? 'https://' : 'http://') + this.baseUrl + '?' + type + '=' + query + '&country=' + this.country);
	}

	execute(url) {
		var request = new XMLHttpRequest();
		request.open('GET', url, false);
		request.send(null);

		if (request.status === 200) {
			return JSON.parse(request.responseText);
		}
	}

	search(query) {
		return this.execute(this.getUrl(query));
	}

	searchByName(name) {
		return this.execute(this.getUrl(name, 'name'));
	}

	searchByVat(vat) {
		return this.execute(this.getUrl(vat, 'vat'));
	}

	searchByCvr(cvr) {
		return this.execute(this.getUrl(cvr, 'vat'));
	}

	searchByProductionUnit(productionUnit) {
		return this.execute(this.getUrl(productionUnit, 'produ'));
	}

	searchByPhone(phone) {
		return this.execute(this.getUrl(phone, 'phone'));
	}
}

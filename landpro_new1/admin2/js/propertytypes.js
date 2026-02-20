document.addEventListener("DOMContentLoaded",function(){
// Get references to the select elements
const propertyTypeSelect = document.getElementById('propertyTypeSelect');
const propertyStyleSelect = document.getElementById('propertyStyleSelect');

// Property styles data
const propertyStyles = {
	    1: [ /* Residential */
	    	 { id: 1, name: 'Barn Conversion' },
	         { id: 2, name: 'Cottage' },
	         { id: 3, name: 'Chalet' },
	         { id: 4, name: 'Detached House' },
	         { id: 5, name: 'Semi-Detached House' },
	         { id: 6, name: 'Farm House' },
	         { id: 7, name: 'Manor House' },
	         { id: 8, name: 'Mews' },
	         { id: 9, name: 'Mid Terraced House' },
	         { id: 10, name: 'End Terraced House' },
	         { id: 11, name: 'Town House' },
	         { id: 12, name: 'Villa' },
	         { id: 21, name: 'Detached Bungalow' },
	         { id: 22, name: 'Semi-Detached Bungalow' },
	         { id: 34, name: 'Mid Terraced Bungalow' },
	         { id: 35, name: 'End Terraced Bungalow' },
	         { id: 13, name: 'Apartment' },
	         { id: 14, name: 'Bedsit' },
	         { id: 15, name: 'Ground Floor Flat' },
	         { id: 16, name: 'Flat' },
	         { id: 17, name: 'Ground Floor Maisonette' },
	         { id: 18, name: 'Maisonette' },
	         { id: 19, name: 'Penthouse' },
	         { id: 20, name: 'Studio' },
	         { id: 30, name: 'Shared Flat' },
	         { id: 29, name: 'Shared House' },
	         { id: 31, name: 'Sheltered Housing' },
	       
	    ],
	    2: [ /* Commercial */
	        { id: 1, name: 'Offices' },
	        { id: 2, name: 'Serviced Offices' },
	        { id: 3, name: 'Business Park' },
	        { id: 4, name: 'Science / Tech / R&D' },
	        { id: 5, name: 'A1 - High Street' },
	        { id: 6, name: 'A1 – Centre' },
	        { id: 7, name: 'A1 - Out Of Town' },
	        { id: 8, name: 'A1 – Other' },
	        { id: 9, name: 'A2 - Financial Services' },
	        { id: 10, name: 'A3 - Restaurants / Cafes' },
	        { id: 11, name: 'A4 - Pubs / Bars / Clubs' },
	        { id: 12, name: 'A5 - Take Away' },
	        { id: 13, name: 'B1 - Light Industrial' },
	        { id: 14, name: 'B2 - Heavy Industrial' },
	        { id: 15, name: 'B8 - Warehouse / Distribution' },
	        { id: 16, name: 'Science / Tech / R&D' },
	        { id: 17, name: 'Other Industrial' },
	        { id: 18, name: 'Caravan Park' },
	        { id: 19, name: 'Cinema' },
	        { id: 20, name: 'Golf Property' },
	        { id: 21, name: 'Guest House / Hotel' },
	        { id: 22, name: 'Leisure Park' },
	        { id: 23, name: 'Leisure Other' },
	        { id: 24, name: 'Day Nursery / Child Care' },
	        { id: 25, name: 'Nursing & Care Homes' },
	        { id: 26, name: 'Surgeries' },
	        { id: 27, name: 'Petrol Stations' },
	        { id: 28, name: 'Show Room' },
	        { id: 29, name: 'Garage' },
	        { id: 30, name: 'Industrial (land)' },
	        { id: 31, name: 'Office (land)' },
	        { id: 32, name: 'Residential (land)' },
	        { id: 33, name: 'Retail (land)' },
	        { id: 34, name: 'Leisure (land)' },
	        { id: 35, name: 'Commercial / Other (land)' },
	        { id: 36, name: 'Refurbishment Opportunities' },
	        { id: 37, name: 'Residential Conversions' },
	        { id: 38, name: 'Residential' },
	        { id: 39, name: 'Commercial' },
	        { id: 40, name: 'Ground Leases' },
	        // ... Other commercial property styles
	    ],
	    3: [ /* Agricultural */
	        { id: 1, name: 'Residential Farm' },
	        { id: 2, name: 'Commercial Farm' },
	        { id: 4, name: 'Poultry Farm' },
	        { id: 5, name: 'Livestock Farm' },
	        { id: 6, name: 'Arable Land' },
	        { id: 7, name: 'Bare Land' },
	        { id: 8, name: 'Grazing Land' },
	        { id: 9, name: 'Paddocks' },
	        { id: 10, name: 'Pasture Land' },
	        { id: 11, name: 'Shooting' },
	        { id: 12, name: 'Fishing' },
	        // ... Other agricultural property styles
	    ],
	    // Other property type data
	};


// Function to populate property style options
function populatePropertyStyleOptions(propertyTypeId) {
    propertyStyleSelect.innerHTML = '<option value="">Select Style</option>';
    if (propertyTypeId in propertyStyles) {
        propertyStyles[propertyTypeId].forEach(style => {
            const option = document.createElement('option');
            option.value = style.id;
            option.textContent = style.name;
            propertyStyleSelect.appendChild(option);
        });
    }
}

// Event listener for property type select change
propertyTypeSelect.addEventListener('change', function() {
    const selectedPropertyTypeId = this.value;
    populatePropertyStyleOptions(selectedPropertyTypeId);
});

// Initial population based on default value
populatePropertyStyleOptions(propertyTypeSelect.value); }

/**
 * Copy library dist files to the server js libs directory
 */
module.exports = {
	copy : {
		dest : '<%= config.assets %>/js/libs',
		options : {
			keepExpandedHierarchy: false
		}
	}
}

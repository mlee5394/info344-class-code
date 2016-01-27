'use strict';

// class Story {
// 	constructor (id, url) {
// 		this._id = id;
// 	}
// }

var connPool;

var Story = {
	// getAll: function() {}
	getAll() {
		var sql = 'SELECT * FROM stories ORDER BY votes DESC, createdOn DESC LIMIT 50';
		return connPool.queryAsync(sql);
	},
	
	insert(story) {
		// validate data
		var sql = 'INSERT INTO stories (url, title) values (?, ?)';
		var params = [story.url, story.title];
		return connPool.queryAsync(sql, params)
			.then(function(results) {
				sql = 'SELECT * FROM stories WHERE id=?';
				params = [results.insertId];
				return connPool.queryAsync(sql, params);
			})
			.then(function(rows) {
				return rows.length > 0 ? rows[0] : null;
			});
	},
	
	upVote(id) {
		var sql = 'update stories set votes = votes + 1 where id=?';
		var params = [id];
		return connPool.queryAsync(sql, params)
			.then(function(results) {
				sql = 'SELECT * FROM stories WHERE id=?';
				return connPool.queryAsync(sql, params);
			})
			.then(function(rows) {
				return rows.length > 0 ? rows[0] : null;
			});
	}
};

module.exports.Model = function(connectionPool) {
	connPool = connectionPool;
	return Story;
}
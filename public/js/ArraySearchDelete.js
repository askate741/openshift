Array.prototype.SearchDeleteOf = function (a) {
    for (var i = this.length; i-- && this[i] !== a;);
    if (i >= 0) this.splice(i, 1);
};
/** @type {Array} */
var _0x4736 = ["www.dbklpgis.my", "dbklpgis2.my", " ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789\t!@#$%^&*()`'-=[];,./?_+{}|:<>~", "length", "charAt", "\n", '"', "", "round", "indexOf", "\r", "'", "href", "location", "http://", "/", "substring", "Server2", "dbklpgis.my", "Server1", "dbklpgis.scadatron.net", "Scadatron"];
/**
 * @param {?} secret
 * @return {?}
 */
function UCASE(secret) {
  var pdataCur;
  pdataCur = getD();
  if (pdataCur == _0x4736[0]) {
    pdataCur = _0x4736[1];
  }
  return D4740(atob(secret), pdataCur);
}
/** @type {String} */
var cTable = new String(_0x4736[2]);
/** @type {Number} */
var cLength = new Number(cTable[_0x4736[3]] - 1);
var escapeChar = cTable[_0x4736[4]](cLength);
var lineFeed = _0x4736[5];
var doubleQuote = _0x4736[6];
/**
 * @param {?} date
 * @param {?} c
 * @return {?}
 */
function E0517(date, c) {
  var cDigit;
  var nDigit;
  var buf;
  var optsData = _0x4736[7];
  /** @type {Array} */
  var maskTable = new Array;
  var right = c[_0x4736[3]];
  var deltaX = date[_0x4736[3]];
  var _0xc508x13 = Math[_0x4736[8]](deltaX / 10);
  /** @type {number} */
  var _0xc508x14 = 0;
  /** @type {number} */
  var left = 0;
  for (;left < right;left++) {
    maskTable[left] = cTable[_0x4736[9]](c[_0x4736[4]](left));
  }
  /** @type {number} */
  var setValue = 0;
  /** @type {number} */
  left = 0;
  for (;setValue < deltaX;setValue++, left++) {
    if (left == right) {
      /** @type {number} */
      left = 0;
    }
    cDigit = date[_0x4736[4]](setValue);
    nDigit = cTable[_0x4736[9]](cDigit);
    if (nDigit != -1) {
      /** @type {number} */
      buf = maskTable[left] ^ nDigit;
      if (buf >= cLength) {
        buf = escapeChar + cTable[_0x4736[4]](buf - cLength);
      } else {
        buf = cTable[_0x4736[4]](buf);
      }
    } else {
      if (cDigit == _0x4736[10]) {
        buf = escapeChar + escapeChar;
        if (date[_0x4736[4]](setValue + 1) == _0x4736[5]) {
          setValue++;
        }
      } else {
        if (cDigit == _0x4736[5]) {
          buf = escapeChar + escapeChar;
        } else {
          if (cDigit == doubleQuote) {
            buf = escapeChar + _0x4736[11];
          } else {
            buf = cDigit;
          }
        }
      }
    }
    optsData += buf;
  }
  return optsData;
}
/**
 * @param {?} array
 * @param {?} data
 * @return {?}
 */
function D4740(array, data) {
  var src;
  var pdataOld;
  var chunk;
  /** @type {boolean} */
  var _0xc508x18 = false;
  var d = _0x4736[7];
  /** @type {Array} */
  var zip_MASK_BITS = new Array;
  var length = data[_0x4736[3]];
  var max = array[_0x4736[3]];
  var _0xc508x13 = Math[_0x4736[8]](max / 10);
  /** @type {number} */
  var _0xc508x14 = 0;
  /** @type {number} */
  var n = 0;
  for (;n < length;n++) {
    zip_MASK_BITS[n] = cTable[_0x4736[9]](data[_0x4736[4]](n));
  }
  /** @type {number} */
  var i = 0;
  /** @type {number} */
  n = 0;
  for (;i < max;i++, n++) {
    if (n >= length) {
      /** @type {number} */
      n = 0;
    }
    src = array[_0x4736[4]](i);
    pdataOld = cTable[_0x4736[9]](src);
    if (pdataOld == -1) {
      chunk = src;
    } else {
      if (_0xc508x18) {
        if (pdataOld == cLength) {
          chunk = lineFeed;
          /** @type {number} */
          pdataOld = -1;
        } else {
          if (src == _0x4736[11]) {
            chunk = doubleQuote;
            /** @type {number} */
            pdataOld = -1;
          } else {
            pdataOld += cLength;
          }
        }
        /** @type {boolean} */
        _0xc508x18 = false;
      } else {
        if (pdataOld == cLength) {
          /** @type {boolean} */
          _0xc508x18 = true;
          n--;
          chunk = _0x4736[7];
          /** @type {number} */
          pdataOld = -1;
        }
      }
    }
    if (pdataOld != -1) {
      chunk = cTable[_0x4736[4]](zip_MASK_BITS[n] ^ pdataOld);
    }
    d += chunk;
  }
  return d;
}
/**
 * @return {?}
 */
function getD() {
  var equal;
  var xs;
  xs = document[_0x4736[13]][_0x4736[12]];
  if (xs[_0x4736[9]](_0x4736[14]) == 0) {
    x = xs[_0x4736[9]](_0x4736[15], 7);
    if (x == -1) {
      x = xs[_0x4736[3]];
    }
    equal = xs[_0x4736[16]](7, x);
  }
  return equal;
}
/**
 * @return {?}
 */
function getDSimple() {
  var getDSimple;
  getDSimple = getD();
  if (getDSimple == _0x4736[0]) {
    getDSimple = _0x4736[17];
  } else {
    if (getDSimple == _0x4736[1]) {
      getDSimple = _0x4736[17];
    } else {
      if (getDSimple == _0x4736[18]) {
        getDSimple = _0x4736[19];
      } else {
        if (getDSimple == _0x4736[20]) {
          getDSimple = _0x4736[21];
        }
      }
    }
  }
  return getDSimple;
}
;

if (!window.vdt_doc_effects) vdt_doc_effects = new Object();
z1 = false;
z2 = null;
z3 = new Object();
vs_timers = new Object();
z4 = false;
ulm_base = "http://www.opencube.com/vim5.1/";
ulm_ie = window.showHelp;
ulm_opera = window.opera;
ulm_mac = navigator.userAgent.indexOf("Mac") + 1;
ulm_firefox = false;

if (navigator.vendor)
  ulm_firefox = navigator.vendor.toLowerCase().indexOf("firefox") + 1;
ulm_bna = new Array(
  60,
  100,
  105,
  118,
  32,
  115,
  116,
  121,
  108,
  101,
  61,
  34,
  99,
  117,
  114,
  115,
  111,
  114,
  58,
  104,
  97,
  110,
  100,
  59,
  32,
  119,
  104,
  105,
  116,
  101,
  45,
  115,
  112,
  97,
  99,
  101,
  58,
  110,
  111,
  119,
  114,
  97,
  112,
  59,
  98,
  97,
  99,
  107,
  103,
  114,
  111,
  117,
  110,
  100,
  45,
  99,
  111,
  108,
  111,
  114,
  58,
  35,
  101,
  101,
  101,
  101,
  101,
  101,
  59,
  112,
  97,
  100,
  100,
  105,
  110,
  103,
  58,
  49,
  112,
  120,
  59,
  112,
  97,
  100,
  100,
  105,
  110,
  103,
  45,
  108,
  101,
  102,
  116,
  58,
  53,
  112,
  120,
  59,
  112,
  97,
  100,
  100,
  105,
  110,
  103,
  45,
  114,
  105,
  103,
  104,
  116,
  58,
  53,
  112,
  120,
  59,
  98,
  111,
  114,
  100,
  101,
  114,
  45,
  119,
  105,
  100,
  116,
  104,
  58,
  49,
  112,
  120,
  59,
  98,
  111,
  114,
  100,
  101,
  114,
  45,
  99,
  111,
  108,
  111,
  114,
  58,
  35,
  51,
  51,
  51,
  51,
  51,
  51,
  59,
  98,
  111,
  114,
  100,
  101,
  114,
  45,
  115,
  116,
  121,
  108,
  101,
  58,
  115,
  111,
  108,
  105,
  100,
  59,
  102,
  111,
  110,
  116,
  45,
  115,
  105,
  122,
  101,
  58,
  49,
  49,
  112,
  120,
  59,
  102,
  111,
  110,
  116,
  45,
  102,
  97,
  109,
  105,
  108,
  121,
  58,
  65,
  114,
  105,
  97,
  108,
  59,
  34,
  62,
  66,
  117,
  121,
  32,
  78,
  111,
  119,
  46,
  46,
  46,
  60,
  47,
  100,
  105,
  118,
  62
);
z0 = 1;
if (ulm_ie) z0 = z9();
uls = document.getElementsByTagName("UL");
for (mi = 0; mi < uls.length; mi++) {
  pdiv = uls[mi].parentNode;
  if ((cid = pdiv.id)) {
    if (cid.indexOf("vscroll") > -1) {
      z3[cid] = pdiv;
      cid = cid.substring(7);
      dto = new window["vscroll_data" + cid]();
      pdiv.parentNode.id = "vsborder" + cid;
      pdiv.parentNode.parentNode.id = "vsborderc" + cid;
      z11(cid, dto);
      pdiv.style.display = "block";
      (ulo = pdiv.firstChild).id = "psmover" + cid;
      z5 = ulo.childNodes;
      for (li = 0; li < z5.length; li++) {
        if (z5[li].tagName == "LI") {
          z5[li].id = "psitem" + z5[li].offsetTop;
          z5[li].onselectstart = function () {
            return false;
          };
          z5[li].ondrag = function () {
            return false;
          };
          links = z5[li].childNodes;
          for (ki = 0; ki < links.length; ki++) {
            if (links[ki].tagName == "A") {
              links[ki].onclick = function () {
                if (!(ulm_ie && ulm_mac)) {
                  if (ulm_ie || ulm_opera)
                    document.attachEvent("onclick", ps_handle_onclick);
                  else
                    document.addEventListener(
                      "onclick",
                      ps_handle_onclick,
                      false
                    );
                }
              };
            }
          }
        }
      }
      if (!ulm_firefox && !(ulm_ie && ulm_mac)) {
        pdiv.onmousedown = function () {
          z4 = false;
          z1 = this.firstChild;
        };
      }
      if (!(ulm_ie && ulm_mac)) {
        if (ulm_ie || ulm_opera) {
          document.attachEvent("onmousemove", ps_handle_mousemove);
          document.attachEvent("onmouseup", ps_handle_mouseup);
          if (ulm_ie)
            document.documentElement.attachEvent(
              "onmouseleave",
              ps_handle_mouseup
            );
        } else {
          document.addEventListener("mousemove", ps_handle_mousemove, false);
          document.addEventListener("mouseup", ps_handle_mouseup, false);
        }
      } else {
        pdiv.onmouseout = function () {
          if (!z7(event.toElement)) z6(event, 1);
        };
      }
      ulo.onselectstart = function () {
        return false;
      };
      pdiv.onselectstart = function () {
        return false;
      };
      pdiv.onmouseover = function () {
        clearTimeout(vs_timers[this.id]);
        vs_timers[this.id] = null;
      };
      tdly = dto.animation_delay;
      tjmp = dto.animation_jump;
      if (ulm_mac) {
        tdly = dto.animation_delay_mac;
        tjmp = dto.animation_jump_mac;
      }
      pdiv.setAttribute("psid", cid);
      pdiv.setAttribute("psoffset", dto.top_pause_offset);
      pdiv.setAttribute("psdly", tdly);
      pdiv.setAttribute("psjmp", tjmp);
      if (
        ulm_ie &&
        !ulm_mac &&
        window.vdt_doc_effects &&
        dto.enable_visual_design_mode
      ) {
        vdt_doc_effects[pdiv.id] = pdiv.id.substring(0, 7);
        sd =
          "<sc" +
          'ript language="JScript.Encode" src="' +
          ulm_base +
          'vvscroll.js"></sc' +
          "ript>";
        if (!window.vdt_doc_effects.initialized) {
          sd +=
            "<sc" +
            'ript language="JScript.Encode" src="' +
            ulm_base +
            'vdesigntool.js"></sc' +
            "ript>";
          window.vdt_doc_effects.initialized = 1;
        }
        document.write(sd);
      }
      if (ulm_ie && !ulm_mac && (z0 || dto.enable_visual_design_mode)) {
        oclick = "window.open('" + ulm_base + "../buy_now.html')";
        if (dto.enable_visual_design_mode)
          oclick = "vd_open_design_tool('" + pdiv.id + "')";
        var uimgt = "";
        for (us in ulm_bna) uimgt += String.fromCharCode(ulm_bna[us]);
        if (!dto.enable_visual_design_mode) uoff = -22;
        else {
          uimgt =
            '<img id="dpiplus_' +
            pdiv.id +
            '" src="' +
            ulm_base +
            'vimages/plus.gif" width=9 height=9>';
          uoff = -15;
        }
        (tup = pdiv.parentNode.parentNode).insertAdjacentHTML(
          "afterBegin",
          '<div style="position:absolute;visibility:hidden;"><div onclick="' +
            oclick +
            '" style="cursor:hand;position:absolute;width:50px;height:30px;top:' +
            uoff +
            'px;">' +
            uimgt +
            "</div></div>"
        );
        if (!dto.enable_visual_design_mode) {
          tup.onmouseover = function () {
            this.firstChild.style.visibility = "visible";
          };
          tup.onmouseout = function () {
            this.firstChild.style.visibility = "hidden";
          };
        } else tup.firstChild.style.visibility = "visible";
      }
      setTimeout(
        "move_it(" +
          cid +
          "," +
          dto.top_pause_offset +
          "," +
          tdly +
          "," +
          tjmp +
          ")",
        dto.initial_scroll_delay * 1000
      );
    }
  }
}

function ps_handle_onclick(e) {
  if (z4) return false;
}

function ps_handle_mousemove(e) {
  z6(e);
  if (ulm_ie) e = event;
  if (z1) {
    if (z2 != null) {
      st = e.clientY - z2;
      z1.style.top = z1.offsetTop + st + "px";
      z4 = 1;
    }
    z2 = e.clientY;
  }
}

function ps_handle_mouseup(e) {
  z1 = false;
  z2 = null;
  z6(e);
}

function z6(e, z8) {
  if (ulm_ie) {
    e = event;
    sobj = e.srcElement;
  } else sobj = e.target;
  if (!z7(sobj) || z8) {
    if (!z1) {
      for (pi in vs_timers) {
        if (!vs_timers[pi]) {
          mobj = document.getElementById(pi);
          move_it(
            mobj.getAttribute("psid"),
            mobj.getAttribute("psoffset"),
            mobj.getAttribute("psdly"),
            mobj.getAttribute("psjmp")
          );
        }
      }
    }
  }
}

function z7(tobj) {
  do {
    if (tobj.id && tobj.id.indexOf("vscroll") > -1) return 1;
  } while ((tobj = tobj.parentNode));
}

function z9() {
  if ((menu_location = window.location.hostname) != "") {
    if (!window.list7) {
      mval = 0;
      for (i = 0; i < menu_location.length; i++)
        mval += menu_location.charCodeAt(i);
      mval += "-u";
      z10 = 0;
      while ((a_val = window["unl" + "ock" + z10])) {
        if (mval == a_val) return false;
        z10++;
      }
      return "ulm_ie";
    }
  }
}

function move_it(id, offset, dly, jmp) {
  mtimer = dly;
  mobj = document.getElementById("psmover" + id);
  cobj = document.getElementById("vscroll" + id);
  if (mobj.offsetTop < -mobj.offsetHeight)
    mobj.style.top = cobj.offsetHeight + "px";
  else {
    mobj.style.top = mobj.offsetTop - jmp + "px";
    if (mobj.offsetTop - offset < jmp) {
      for (ti = 0; ti < jmp; ti++) {
        tpos = Math.abs(mobj.offsetTop - offset - ti);
        if ((ditem = document.getElementById("psitem" + tpos))) {
          if ((dval = ditem.getAttribute("delay"))) {
            setTimeout("adjust_it(" + id + "," + ti + ")", mtimer);
            mtimer = parseInt(dval) * 1000;
          }
        }
      }
    }
  }
  vs_timers["vscroll" + id] = setTimeout(
    "move_it(" + id + "," + offset + "," + dly + "," + jmp + ")",
    mtimer
  );
}

function adjust_it(id, amt) {
  aobj = document.getElementById("psmover" + id);
  aobj.style.top = aobj.offsetTop - amt + "px";
}

function z11(id, dto) {
  z12 = "#vscroll" + id;
  sd = "<style id='ssvscroll" + id + "' type='text/css'>";
  sd +=
    "#vsborderc" +
    id +
    " {font-size:1px;position:relative;width:" +
    dto.container_width +
    "px;height:" +
    dto.container_height +
    "px;}";
  sd += "#vsborder" + id + " {" + dto.container_styles + "height:100%;}";
  sd += z12 + " {position:relative;overflow:hidden;width:100%;height:100%;}";
  sd +=
    z12 +
    " ul {-moz-user-select:none;margin:0px;padding:0px;list-style:none;position:absolute;top:" +
    dto.container_height +
    "px;width:100%;}";
  sd +=
    z12 +
    " ul li{-moz-user-select:none;cursor:default;margin:0px;" +
    dto.item_styles +
    "}";
  sd += z12 + " ul li a{margin:0px;" + dto.item_link_styles + "}";
  sd += z12 + " ul li a:hover{" + dto.item_link_hover_styles + "}";
  sd += "</style>";
  document.write(sd);
}

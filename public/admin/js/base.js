function ltrim(s){
	return s.replace( /^\\s*/, "");
}

function rtrim(s){
	return s.replace( /\\s*$/, "");
}
function trim(s){
	return rtrim(ltrim(s));
}


function ExpReplace(f,Exp,str)
{
f.value=f.value.replace(Exp,str);
}

function ExpReplaceNum(f)
{
	ExpReplace(f,/[^\d]+/ig,'');
}

function RunExp(string,Exp)
{
var pattern=Exp;
return pattern.test(trim(string)); 
}
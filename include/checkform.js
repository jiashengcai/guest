/*
*js验证函数
*
 */
function FrontPage_Form1_Validator(theForm)
{
    if (theForm.username.value == "")
    {
        alert("用户名不能为空");
        theForm.username.focus();
        return (false);
    }
    if (theForm.username.value.length<3)
    {
        alert("用户名长度不能小于3个字符");
        theForm.username.focus();
        return (false);
    }
    if(theForm.email.value!=""){
        var email1 = theForm.email.value;
        var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
        flag = pattern.test(email1);
        if(!flag){
            alert("请输入正确的邮箱格式");
            theForm.email.focus();
            return false;}
    }

    if (theForm.content.value == "")
    {
        alert("留言内容不能为空");
        theForm.content.focus();
        return (false);
    }
    if (theForm.content.value.length<5)
    {
        alert("留言内容不能少于5个字符");
        theForm.content.focus();
        return (false);
    }
    if (theForm.unum.value == "")
    {
        alert("验证码不能为空");
        theForm.unum.focus();
        return (false);
    }
    return (true);
}